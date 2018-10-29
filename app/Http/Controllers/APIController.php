<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use Illuminate\Http\Request;
use App\User;
use Hash;
use JWTAuth;

class APIController extends Controller
{

    public function register(Request $request)
    {

        $input             = $request->all();
        $input['password'] = Hash::make($input['password']);

        User::create($input);
        return response()->json(['result' => true]);
    }

    public function login(Request $request)
    {
        $input = $request->all();
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json(['result' => 'wrong email or password.']);
        }
        return response()->json(['result' => $token]);
    }

    public function get_user_details(Request $request)
    {
        $input  = $request->all();
        $user   = JWTAuth::toUser();

        throw new ApiException('用户未登录');


        return $this->jsonReturn($user,4);
    }

    public function getToken()
    {
        $user  = User::first();
        $token = JWTAuth::fromUser($user);
        return $token;
    }

}
