<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    public function getEmail()
    {
     return view('auth.passwords.email');
    }

 public function postEmail(Request $request)
  {
    $request->validate([
        'email' => 'required|email|exists:users',
    ]);

    $token = str_random(64);

      DB::table('password_resets')->insert(
          ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
      );

      Mail::send('auth.verify', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('Reset Password Notification');
      });

      return back()->with('message', 'We have e-mailed your password reset link!');
  }

    use SendsPasswordResetEmails;
}
