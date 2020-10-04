<?php

namespace App\Services;

use App\thongbao;
use Symfony\Component\HttpFoundation\Response;

class thongbaoService{
    public function save(array $data, int $id = null){
        try {
            $thongbao = thongbao::updateOrCreate(
                [
                    'id_thongbao' = $id
                ],
                [
                    'content'      => $data['content'],
                    'id_phongban'  => $data['id_phongban'],
                    'status'       => $data['status'],
                    'datecreated'  => $data['datecreated']
                ]
            );

            
        } catch (\Exception  $e) {
            return response()->json([
                'status' => false;
                'code'   => Response::500;
                'message'=> $e->getMessage();
            ]);
        }
    }
}