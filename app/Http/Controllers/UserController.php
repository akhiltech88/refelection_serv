<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Validator;
use Response;

class UserController extends Controller
{
    public $successStatus = 200;

	    public function login(){ 
	        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
	            $user = Auth::user(); 
	            $data = array( 
                        'api_token' => Auth::user()->api_token,
                        'name' => Auth::user()->name,
                        'id' => Auth::user()->id,
                        'super_admin'  => (Auth::user()->super_admin == 1)? 'true':'false'
                        );
	            return response()->json(['data' => $data,'success' => 'true'], $this-> successStatus);
	        } 
	        else{ 
	            return response()->json(['error'=>'Unauthorised','success' => 'false'], 401); 
	        } 
	    }
	    public function register(Request $request) 
	    { 
	        $validator = Validator::make($request->all(), [ 
	            'name' => 'required', 
	            'email' => 'required|email|unique:users,email,NULL,id,deleted_at,NULL', 
	            'password' => 'required', 
	            'c_password' => 'required|same:password', 
	        ]);
			if ($validator->fails()) { 
			    return response()->json(['error'=>$validator->errors()], 401);            
			}
			$input = $request->all(); 
	        $input['password'] = bcrypt($input['password']);
	        $input['api_token'] = str_random(200);
	        $user = User::create($input);
	        if($user){
			return response()->json(['data'=>$user,'success' => 'true'], $this-> successStatus);
			} 
	        else{ 
	            return response()->json(['error'=>'Unauthorised','success' => 'false'], 401); 
	        } 
	    }
	    public function details() 
	    { 
	        $user = Auth::user(); 
	        return response()->json(['success' => $user], $this-> successStatus); 
	    } 
}
