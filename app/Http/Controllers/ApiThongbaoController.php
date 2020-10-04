<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thongbao;
use App\Services\thongbaoService;
use Symfony\Component\HttpFoundation\Response;


class ApiThongbaoController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $thongbaoService;

    // public function __construct(thongbaoService $thongbaoService){
    //     $this->thongbaoService =  $thongbaoService; 
    // }
    
    public function index()
    {
       $thongbao =  thongbao::all();

       return  response()->json([
           'status' => true,
           'code'   => Response::HTTP_OK,
           'data'   => $thongbao,
       ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $createThongbao = thongbao::updateOrCreate(
                
                [
                    'content'      => $request->content,
                    'id_phongban'  => $request->id_phongban,
                ]
            );
            return response()->json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'createThongbao'=> $createThongbao,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'code'   => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message'=> $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $updateThongbao = thongbao::updateOrCreate(
                [
                    'id' => $id
                ],
                [
                    'content'      => $request->content,
                    'id_phongban'  => $request->id_phongban,
                ]
            );
            return response()->json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'updateThongbao'=> $updateThongbao,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'code'   => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message'=> $e->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        try {
            $deleteThongbao = thongbao::destroy($id);
            return response()->json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'deleteThongbao' =>$deleteThongbao,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => false,
                'code'   => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message'=> $e->getMessage(),
            ]);
        }
    }
}
