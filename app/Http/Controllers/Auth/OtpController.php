<?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\Otp;
// use App\Models\User;
// use Illuminate\Support\Facades\Auth;

// class OtpController extends Controller
// {
//     public function sendOtp(Request $request)
//     {
//         $user = User::where('phone',$request->phone)->first();
    
//         if(!$user){
//             return back()->with(
//                 'error',
//                 'This mobile number is not registered'
//             );
//         }
    
//         $otp = rand(1000,9999);
    
//         Otp::create([
//             'phone' => $request->phone,
//             'otp' => $otp
//         ]);
    
//         return view('auth.verify-otp',[
//             'phone' => $request->phone,
//             'otp' => $otp
//         ]);
//     }

//     public function verifyOtp(Request $request)
//     {
//         $otp = Otp::where('phone', $request->phone)
//                   ->where('otp', $request->otp)
//                   ->latest()
//                   ->first();
    
//         if(!$otp){
//             return back()->with('error','Invalid OTP');
//         }
    
//         $user = User::where('phone',$request->phone)->first();
    
//         if(!$user){
//             return redirect('/register')
//                 ->with('error','Mobile number not registered');
//         }
    
//         Auth::login($user);
    
//         return redirect('/');
//     }
// }



namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->with(
                'error',
                'This email address is not registered'
            );
        }

        $otp = rand(1000, 9999);

        Otp::create([
            'email' => $request->email,
            'otp' => $otp
        ]);

        // Send OTP to email
        Mail::raw(
            "Your VELOURA login OTP is: {$otp}",
            function ($message) use ($request) {
                $message->to($request->email)
                        ->subject('VELOURA Login OTP');
            }
        );

        return view('auth.verify-otp', [
            'email' => $request->email
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required'
        ]);

        $otp = Otp::where('email', $request->email)
                  ->where('otp', $request->otp)
                  ->latest()
                  ->first();

        if (!$otp) {
            return back()->with('error', 'Invalid OTP');
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect('/register')
                ->with('error', 'Email address not registered');
        }

        Auth::login($user);

        $request->session()->regenerate();

        // Admin → Admin Dashboard
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }

        // Normal user → Home
        return redirect('/');
    }
}