<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class PasswordResetController extends Controller
{

    // forgot password
    public function showPasswordResetForm(){
        return view('admin.auth.forgot-password');
    }

    
    // public function sendResetLinkEmail(Request $request)
    // {
    //     $request->validate(['email'=> 'required|email']);
    //     $admin = Admin::where('email', $request->email)->first();
    //     if(!$admin){
    //         return back()->with('error', "Admin not found with the provided email address.");
    //     }
    
    //     $response = Password::broker('admins')->sendResetLink(
    //         $request->only('email')
    //     );
    
    //     if ($response == Password::RESET_LINK_SENT) {
    //         Log::info('Password reset link sent to ' . $request->email);
    //         return back()->with(['status' => __($response)]);
    //     } else {
    //         Log::error('Failed to send password reset link to ' . $request->email . ': ' . $response);
    //         return back()->with(['status' => __($response)]);
    //     }
    // }


    
    public function sendResetLinkEmail(Request $request)
{
    $request->validate(['email' => 'required|email']);
    $admin = Admin::where('email', $request->email)->first();
    if (!$admin) {
        return back()->with('error', "Admin not found with the provided email address.");
    }

    $token = Password::createToken($admin);

    Mail::to($admin->email)->send(new ResetPasswordMail($token, $admin->email));

    return back()->with('status', __('Password reset link sent!'));
}
    
    public function showResetForm($token)
    {
        $admin = Admin::first();
        $email = $admin->email;
        // dd($email);
        return view('admin.auth.reset-password', ['token' => $token, 'email'=>$email]);
    }
    

    public function reset(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
    ]);
    $response = Password::broker('admins')->reset(
        $request->only('email','password', 'password_confirmation', 'token'),
        function (Admin $admin, string $password) {
            $admin->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
            $admin->save();
            event(new PasswordReset($admin));
        }
    );
    return $response == Password::PASSWORD_RESET
        ? redirect()->route('admin.login-Form')->with('status', __($response))
        : back()->with(['status' => __($response)]);
}


}
