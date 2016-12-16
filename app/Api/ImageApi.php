<?php
namespace App\Api;

use Response;

class ImageApi{

    public $Status = 0;
    public $ImageUrl = "";
    public $Error = "";

    public function AjaxReturnImageUrl() {
//        return Response::json([
//            'status'    =>  $this -> Status,
//            'url'       =>  $this -> ImageUrl,
//        ]);
        return json_encode([
            'status'    =>  $this -> Status,
            'url'       =>  $this -> ImageUrl,
        ]);
    }

    public function AjaxReturnError() {
        return Response::json([
            'status'    =>  $this -> Status,
            'error'       =>  $this -> Error,
        ]);
    }
}