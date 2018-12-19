<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTFactory;
use JWTAuth;
use Response;
class TestController extends Controller{

	public function testUrl(){
		/*$user = User::first();
        $token = JWTAuth::fromUser($user);

        return Response::json(compact('token'));*/
	}

	public function testSaveUser(){
		$user = User::create([
            'name' => 'rakib3',
            'email' => 'rakib3@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        /*$token = JWTAuth::fromUser($user);
        
        return Response::json(compact('token'));*/
        return $user ;
	}

	public function testLogin(){
		$user = User::where('id',2)->first();
		$token = JWTAuth::fromUser($user);
        return Response::json(compact('token'));
	}

	public function testLoggedInUser(){
		$token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3QvcHJvamVjdHNfcG9ydGZvbGlvL3dlYmFwaS90ZXN0Q3JlZGVudGlhbFVzZXIiLCJpYXQiOjE1NDUyNDg5NjIsImV4cCI6MTU0NTI1MjU2MiwibmJmIjoxNTQ1MjQ4OTYyLCJqdGkiOiJmQjFwbkN3azRqMTlCaDZCIn0.rj1S5P58Fg0Oy5RK0rShMdwTz-s9_od9m1MGp_2mZ5Y';
		$user = JWTAuth::toUser($token);
        return Response::json(compact('user'));
	}

	public function testCredentialUser(){
		
        $credentials = [
        	'email' => 'rakib@gmail.com', 
        	'password' => '123456'
        ];
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return Response::json(compact('token'));
	}

	public function testQueryString($id='1',Request $request){
		return $request->all();
		return $id;
		/*$token = $request['token'];
		$user = JWTAuth::toUser($token);
        return Response::json(compact('user'));*/
	}
}
