<?php

namespace App\Http\Controllers\Api;

trait ApiResponseTrail{

    public function ApiResponse($data = null, $error = null,$code = 200){

        $array = [
            'data'   => $data,
            'status' => $code == 200 ? true : false,
            'error'  => $error
        ];

        return response()->json($array , $code);
    }
}
