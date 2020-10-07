<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;

class ApiUserController extends Controller
{
    
    public $successStatus = 200;

     /** 
         * login api 
         * 
         * @return \Illuminate\Http\Response 
         */ 

        public function login(Request $request){ 
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];
    
            if(Auth::attempt($credentials))
            {
                
                return response()->json([
                    'status' => true,
                    'code'   => Response::HTTP_OK,
                    'mess'   => "đăng nhập thành công",
                    'data'   => Auth::user(),
                ]);
            }else{
                return response()->json([
                    'status' => false,
                    'code'   => Response::HTTP_INTERNAL_SERVER_ERROR,
                    'mess'   => 'tài khoản hoặc mật khẩu không đúng'  
                ]);
            }

    } 
    public function checkEmailUser(Request $request){
        $email = $request->email;

        $checkUser = User::where('email', $email)->first();
        if(!$checkUser)
        {
            return response()->json([
                'status' => true,
                'code'   => Response::HTTP_INTERNAL_SERVER_ERROR,
                'mess'   => 'email không tồn tại'  
            ]); 
        }else{
           
            return response()->json([
                'status' => false,
                'code'   => Response::HTTP_OK,
                'data'   => User::orderBy('id')->where('email', $email)->first(),
            ]);
        }
    }
    public function resetPassword(Request $request,$id){
                   
        try {
            $resetPassword = User::updateOrCreate([
                'id' => $id
            ],[
                'password' => bcrypt($request->password)
            ]);
            return response()->json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'mess'   => "đổi mật khẩu thành công",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'code'   => Response::HTTP_INTERNAL_SERVER_ERROR,
                'mess'   => $th->getMessage()  
            ]); 
        }
    }

    public function changePassword(Request $request,$id){
                   
        try {
            $resetPassword = User::updateOrCreate([
                'id' => $id
            ],[
                'password' => bcrypt($request->password)
            ]);
            return response()->json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'mess'   => "đổi mật khẩu thành công",
                'data'   =>  $resetPassword 
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'code'   => Response::HTTP_INTERNAL_SERVER_ERROR,
                'mess'   => $th->getMessage()  
            ]); 
        }
    }
 
}
