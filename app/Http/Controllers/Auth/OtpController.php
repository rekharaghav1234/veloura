<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OtpController extends Controller
{
    // public function sendOtp(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email'
    //     ]);

    //     $user = User::where('email', $request->email)->first();

    //     if (!$user) {
    //         return back()->with(
    //             'error',
    //             'This email address is not registered'
    //         );
    //     }

    //     $otp = rand(1000, 9999);

    //     Otp::create([
    //         'email' => $request->email,
    //         'otp' => $otp
    //     ]);

    //     // Send OTP to email
    //     Mail::raw(
    //         "Your VELOURA login OTP is: {$otp}",
    //         function ($message) use ($request) {
    //             $message->to($request->email)
    //                     ->subject('VELOURA Login OTP');
    //         }
    //     );

    //     return view('auth.verify-otp', [
    //         'email' => $request->email
    //     ]);
    // }
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
    
        try {
    
            $response = Http::withHeaders([
                'api-key' => env('BREVO_API_KEY'),
                'Content-Type' => 'application/json',
            ])->post('https://api.brevo.com/v3/smtp/email', [
    
                'sender' => [
                    'name' => 'VELOURA',
                    'email' => env('MAIL_FROM_ADDRESS'),
                ],
    
                'to' => [
                    [
                        'email' => $request->email,
                    ],
                ],
    
                'subject' => 'VELOURA Login OTP',
    
                'textContent' => "Your VELOURA login OTP is: {$otp}",
            ]);
    
            if ($response->failed()) {
                throw new \Exception($response->body());
            }
    
            return view('auth.verify-otp', [
                'email' => $request->email
            ]);
    
        } catch (\Throwable $e) {
    
            return back()->with(
                'error',
                'Unable to send OTP. Please try again.'
            );
        }
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