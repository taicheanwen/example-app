<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Mail;

class UserController extends Controller
{
    public function register(Request $request){
        try {
            $user = new User();
            $user->name = $request->post('name');
            $user->email = $request->post('email');
            $user->password = bcrypt($request->post('password'));
    
            if($user->save()){
                return response()->json([
                    'success' => true,
                ]);
            } else {
                throw new \Exception('Failed to save user.');
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
    
}