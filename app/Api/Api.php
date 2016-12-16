<?php
    namespace App\Api;

    use Response;

    class Api{

        public $Status = 0;
        public $Message = "";
        public $Data = "";

        public function AjaxReturn() {
            if (empty($this -> Data)) {
                return Response::json([
                    'status'    =>  $this -> Status,
                    'msg'       =>  $this -> Message,
                ]);
            }else{
                return Response::json([
                    'status'    =>  $this -> Status,
                    'msg'       =>  $this -> Message,
                    'data'      =>  $this -> Data,
                ]);
            }
        }
    }