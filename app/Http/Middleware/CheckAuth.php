<?php

namespace App\Http\Middleware;

use Closure;
use App\AccessToken;
use Response;
use Carbon\Carbon;
use Validator;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { 
        
        try{

            $validator=Validator::make(getallheaders(),[
                'users_id'=>'required',
                'token'=>'required'
            ]);
            if($validator->fails()){
                return Response::json([
                    'headers'=>$validator->errors()->all()
                ],401);
            }
            else
            {
                $data = external_auth();
                if($data){
                    $body=collect(json_decode($data->getBody(),true));
                    config(['clients_id'=>$body->toArray()['data']['clients_id']]);
                    //config(['client'=>$body->toArray()['data']['client']]);
                    config(['users_id'=>getallheaders()['users_id']]);
                    //config(['user_roles'=>$body['data']['user']['user_roles']]);                
                    return $next($request);
                }else{
                    return Response::json([
                    'message'=>'Invalid Access, Please login for access_token'
                ],401);
                }     
            }
        }
        catch(Exception $e){
            return Response::json([
                'message'=>'Invalid Access, Please login for access'
            ],401);
        }
    }
}
