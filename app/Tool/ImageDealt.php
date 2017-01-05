<?php

    namespace App\Tool;

    use App\Api\ImageApi;
    use App\Model\Upload;
    use Qiniu\Auth;
    use Qiniu\Storage\UploadManager;
    use Request;
    use Intervention\Image\ImageManagerStatic as Image;

    class ImageDealt
    {

        public $field = '';             //  上传图片字段
        public $savePath = '';              //  图片上传路径
        public $path = '';
        public $filePath = '';          //  文件本地绝对路径
        public $fileName = '';          //  文件名称
        public $isThumb = false;        //  是否生成缩略图
        public $width = 300;            //  缩略图宽度
        public $height = 300;           //  缩略图高度
        public $thumbSavePath = '';          //  图片保存路径
        public $thumbPath = '';              //  图片路径
        public $isMark = false;         //  是否添加水印
        public $mark = '';              //  水印位置
        public $extension = '';         //  图片后缀
        public $isQiniu = false;        //  是否上传七牛云储存

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
            $this->fileName = rand(100,999).date('YmdHis').'.'.$this -> extension;
            $this -> savePath = '/upload/' . $this -> path . '/' . $this->fileName;
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
            $this->filePath = public_path().$this->savePath;
            $img -> save($this->filePath);

            if ($this -> isThumb) {
                $this -> thumb();
            }

//            return $this -> savePath;

            $upload = new Upload();

            $fileArr = array(
                'file_name'     =>  $this->fileName,
//                'file_title'    =>  $this -> fileTitle,
                'file_type'     =>  $image -> getClientOriginalExtension(),
                'file_url'     =>  $this -> savePath,
                'file_size'   =>  $image -> getClientSize(),
            );

            $this->isQiniu = config('qiniu.isQiniu');
            if ($this->isQiniu) {
                $info = $this -> qiniu();
                if ($info['status']==0) {
                    $this->savePath = '//'.$info['msg'];
                    $fileArr['qiniu_url'] = $info['msg'];
                }else{
                    $imageApi -> Status = 1;
                    $imageApi -> Error = $info['msg'];
                    return $imageApi -> AjaxReturnError();
                }
            }

            $uploadInfo = $upload -> addUpload($fileArr);

            if (!$uploadInfo) {

                $imageApi -> Status = 1;
                $imageApi -> Error = '文件信息写入数据库失败！';
                return $imageApi -> AjaxReturnError();
            }


//            $this->isQiniu = config('qiniu.isQiniu' , false);
//            if ($this->isQiniu) {
////                $info = $this -> qiniu();
//                if ($info['status']==0) {
//                    $this->savePath = '//'.$info['msg'];
////                    $fileArr['qiniu_url'] = $info['msg'];
//                }
//            }
            $imageApi -> Status = 0;
            $imageApi -> ImageUrl = $this -> savePath;

            return $imageApi -> AjaxReturnImageUrl();

        }

        public function thumb() {

            $image = Image::make(public_path().$this -> savePath);

            $image  -> resizeCanvas($this -> width , $this -> height);

            $image -> save(public_path().$this -> savePath);
        }

        public function qiniu() {

            $bucket     =   config('qiniu.bucket');
            $SecretKey  =   config('qiniu.SecretKey');
            $AccessKey  =   config('qiniu.AccessKey');
            $domain     =   config('qiniu.domain');

            //  构建鉴权对象
            $auth =  new Auth($AccessKey , $SecretKey);
            $token = $auth -> uploadToken($bucket);

            $uploadManager = new UploadManager();
            list($ret , $err) = $uploadManager -> putFile($token,$this->fileName,$this->filePath);
            if (!$err) {
                $baseUrl = $domain.'/'.$ret['key'];
//                $privateUrl = $auth -> privateDownloadUrl($baseUrl);
                return [
                    'status'    =>   0,
                    'msg'       =>  $baseUrl
                ];
            } else {
                return [
                    'status'    =>   1,
                    'msg'       =>   $err,
                ];
            }

        }
    }