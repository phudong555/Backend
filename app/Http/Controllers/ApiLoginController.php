<?php

namespace App\Http\Controllers;
use App\user;
use App\sessionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


use Symfony\Component\HttpFoundation\Response;


class ApiLoginController extends Controller
{
    public function login(Request $request){
        try {
            $dataCheckLogin = [
                'email' => $request->email,
                'password' => $request->password
            ];
            if(Auth()->attemp($dataCheckLogin)){
              dd('123'); 
                // $checkTokenExit = sessionUser::where('user_id', auth()->id()->first());
                // if(empty($checkTokenExit)){
                //     $userSession = sessionUser::create([
                //         'token' => Str::random(40),
                //         'refresh_token' => Str::random(40),
                //         'token_expried' => date('Y-m-d H:i:s', strtotime('+30 day')),
                //         'refresh_token_expried' =>  date('Y-m-d H:i:s', strtotime('+360 day')),
                //         'user_id'  => auth()->id()
                //     ]);
                // }
                // else{
                //     $userSession =  $checkTokenExit ;
                // }
            }
           return response()->json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                // 'data'   => $userSession
           ]);
        } catch (\Throwable $th) {
            return response()->json([
            'status' => false,
            'code'   => Response::HTTP_INTERNAL_SERVER_ERROR,
            'message'   => $th->getMessage()
            ]);
        }
    }
}
