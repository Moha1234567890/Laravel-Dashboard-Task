<?php




 namespace App\Http\Controllers\Api;



  trait ApiResponseTrait {
    
    public function apiresponse($data = null, $msg = null, $status = null) {


        $array = [
            "data" => $data,
            "msg" => $msg,
            "status" => $status,
        ];

        return response($array, $status);
    }



    }
 