<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\congviec;
use Symfony\Component\HttpFoundation\Response;

class ApiCongviecController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $listJob = congviec::all();
            return response()->json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'listJob'=> $listJob,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'message'=> $e->getMessage(),
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $createCongviec = congviec::updateOrCreate([
                'name'          => $request->name,
                'descript'      => $request->descript,
                'id_phongban'   => $request->id_phongban,
                'daystarted'    => $request->daystarted,
            ]);
            return response()->json([
                'status' => true,
                'code'   => Response::HTTP_OK,
                'createCongviec' => $createCongviec,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status'        => false,
                'code'          => Response::HTTP_INTERNAL_SERVER_ERROR,
                'messageErorr'  => $th->getMessage(),
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
            $updateCongviec = congviec::updateOrCreate(
            [
                'id' => $id
            ], 
            [
                'name'          => $request->name,
                'descript'      => $request->descript,
                'id_phongban'   => $request->id_phongban,
                'daystarted'    => $request->daystarted,
            ]);
            return response()->json([
                'status'         => true,
                'code'           => Response::HTTP_OK,
                'updateCongviec' => $updateCongviec,
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'status'  => false,
                'code'      => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message'   => $th->getMessage(),
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
            $deleteCongviec = congviec::destroy($id);
            return response()->json([
                'status'         => true,
                'code'           => Response::HTTP_OK,
                'deleteCongviec' => $deleteCongviec,
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'status'         => true,
                'code'           => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message' => $th->getMessage(),
            ]);
        }
    }
}
