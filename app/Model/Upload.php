<?php

namespace App\Model;

use App\Api\ImageApi;
use Illuminate\Database\Eloquent\Model;
use Request;
use Validator;

class Upload extends Model
{

    public $dateFormat = "U";

    protected $dates = ['created_at'];

    public $field = 'image';

    public $thumb = false;

    public $fileTitle = '';

    public $path = '/upload/article';


    public function addUpload( $file ) {

        foreach ($file as $key => $value) {
            $this -> $key = $value;
        }
        return $this -> save();
    }

    public function upload() {

        $imageApi = new ImageApi();

        if (!Request::hasFile($this -> field)) {

            $imageApi -> Status = 1;
            $imageApi -> Error = '文件不存在';
            return $imageApi -> AjaxReturnError();
        }

        $fileValidatorResult = $this -> fileValidator();

        if (!empty($fileValidatorResult)) {
            return $fileValidatorResult;
        }

        $file = Request::file($this -> field);

        if (!$file -> isValid()) {

            $imageApi -> Status = 1;
            $imageApi -> Error = '文件上传错误';
            return $imageApi -> AjaxReturnError();
        }

        $filePath = public_path($this -> path);
        $fileName = rand(100,999).date("YmdHis").'.'.$file->getClientOriginalExtension();

        $file -> move($filePath , $fileName);

        $fileArr = array(
            'file_name'     =>  $fileName,
            'file_title'    =>  $this -> fileTitle,
            'file_type'     =>  $file -> getClientOriginalExtension(),
            'file_url'     =>  $this -> path .'/'. $fileName,
            'file_size'   =>  $file -> getClientSize(),
        );

        $uploadInfo = $this -> addUpload($fileArr);

        if (!$uploadInfo) {

            $imageApi -> Status = 1;
            $imageApi -> Error = '文件信息写入数据库失败！';
            return $imageApi -> AjaxReturnError();
        }

        $imageApi -> Status = 0;
        $imageApi -> ImageUrl = $this -> path .'/'. $fileName;

        return $imageApi -> AjaxReturnImageUrl();

    }

    private function fileValidator() {

        $validator = Validator::make(Request::only($this -> field) , [

            $this -> field      =>      'max:'.config('site.upload_limit').'|file'
        ] , [

            $this -> field.'.max'   =>  '最大上传支持 '.config('site.upload_limit').' Kb',
            $this -> field.".file"  =>  '文件上传失败',
        ]);

        if ($validator -> fails()) {

            $imageApi = new ImageApi();
            $imageApi -> Status = 1;
            $imageApi -> Error = $validator -> errors() -> first();
            return $imageApi -> AjaxReturnError();

        }
    }

}
