<?php
namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JWTAuth;
use Illuminate\Support\Facades\Auth;
class FrontedLoginController extends Controller{

    public function login(Request $request)
    {
        if($token = JWTAuth::getToken()){
            try{
                JWTAuth::invalidate($token);
            }catch(\Exception $e){
            }
        }

        $credentials = $request->only('email', 'password');

         if (Auth::guard('fronted')->once($credentials)) {
            $user = Auth::guard('fronted')->user();
            $token = JWTAuth::fromUser($user);     
         }

        return response()->json([
            'success' => true,
            'token' => $token,
            'email' => $request->input('email'),
            'username' => $user->name
        ]);
    }

    public function signout(Request $request){
        if($token = JWTAuth::getToken()){
            try{
                JWTAuth::invalidate($token);
            }catch(\Exception $e){
            }
        }
        return response()->json(['success' => true]);
    }
}
