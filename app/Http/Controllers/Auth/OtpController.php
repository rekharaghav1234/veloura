<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Otp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $user = User::where('phone',$request->phone)->first();
    
        if(!$user){
            return back()->with(
                'error',
                'This mobile number is not registered'
            );
        }
    
        $otp = rand(1000,9999);
    
        Otp::create([
            'phone' => $request->phone,
            'otp' => $otp
        ]);
    
        return view('auth.verify-otp',[
            'phone' => $request->phone,
            'otp' => $otp
        ]);
    }

    public function verifyOtp(Request $request)
    {
        $otp = Otp::where('phone', $request->phone)
                  ->where('otp', $request->otp)
                  ->latest()
                  ->first();
    
        if(!$otp){
            return back()->with('error','Invalid OTP');
        }
    
        $user = User::where('phone',$request->phone)->first();
    
        if(!$user){
            return redirect('/register')
                ->with('error','Mobile number not registered');
        }
    
        Auth::login($user);
    
        return redirect('/');
    }
}