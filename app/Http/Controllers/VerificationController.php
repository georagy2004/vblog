<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class VerificationController extends Controller
{
    public function emailVerify($id, $verify_token){
        $user = User::where(['id'=> $id, 'verify_token'=>$verify_token])->first();
        // dd($user);
        if(isset($user) ){
            if(!$user->verified) {
                $user->verified = 1;
                $user->save();
                $success = "Your e-mail is verified. You can now login.";
            }else{
                $success = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/login')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/posts')->with('success', $success);
    
    }
}
