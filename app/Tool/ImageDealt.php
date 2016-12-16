<?php

    namespace App\Tool;

    use App\Api\ImageApi;
    use App\Model\Upload;
    use Request;
    use Intervention\Image\ImageManagerStatic as Image;

    class ImageDealt
    {

        public $field = '';             //  上传图片字段

        public $savePath = '';              //  图片上传路径

        public $path = '';

        public $isThumb = false;        //  是否生成缩略图

        public $width = 300;            //  缩略图宽度

        public $height = 300;           //  缩略图高度

        public $thumbSavePath = '';          //  图片保存路径

        public $thumbPath = '';              //  图片路径

        public $isMark = false;         //  是否添加水印

        public $mark = '';              //  水印位置

        public $extension = '';         //  图片后缀

        public function upload() {

            $imageApi = new ImageApi();

            if (!Request::hasFile($this -> field)) {

                $imageApi -> Status = 1;
                $imageApi -> Error = '文件不存在';
                return $imageApi -> AjaxReturnError();
            }

            $image = Request::file($this -> field);

            if (!$image -> isValid()) {

                $imageApi -> Status = 1;
                $imageApi -> Error = '请上传有效文件';
                return $imageApi -> AjaxReturnError();
            }

            $this -> extension = $image -> getClientOriginalExtension();
            $imageName = rand(100,999).date('YmdHis').'.'.$this -> extension;
            $this -> savePath = '/upload/' . $this -> path . '/' . $imageName;
            $this -> path = '/upload/' . $this -> path;

            $img = Image::make($image);

            if (!is_dir(public_path().$this -> path)) {
                $makeResult = mkdir(public_path().$this -> path);
                if (!$makeResult) {
                    $imageApi -> Status = 1;
                    $imageApi -> Error = '文件上传失败，请检查您的文件夹权限';
                    return $imageApi -> AjaxReturnError();
                }
            }
            $img -> save(public_path().$this->savePath);

            if ($this -> isThumb) {
                $this -> thumb();
            }

//            return $this -> savePath;

            $upload = new Upload();

            $fileArr = array(
                'file_name'     =>  $imageName,
//                'file_title'    =>  $this -> fileTitle,
                'file_type'     =>  $image -> getClientOriginalExtension(),
                'file_url'     =>  $this -> savePath,
                'file_size'   =>  $image -> getClientSize(),
            );

            $uploadInfo = $upload -> addUpload($fileArr);

            if (!$uploadInfo) {

                $imageApi -> Status = 1;
                $imageApi -> Error = '文件信息写入数据库失败！';
                return $imageApi -> AjaxReturnError();
            }

            $imageApi -> Status = 0;
            $imageApi -> ImageUrl = $this -> savePath;

            return $imageApi -> AjaxReturnImageUrl();

        }

        public function thumb() {

            $image = Image::make(public_path().$this -> savePath);

            $image  -> resizeCanvas($this -> width , $this -> height);

            $image -> save(public_path().$this -> savePath);
        }
    }