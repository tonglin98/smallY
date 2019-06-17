<?php
/**
 * Class playGoods
 * @package app\index\controller
 * 商品表
 */
namespace Admin\Controller;
use Think\Controller;

class CommonController extends BaseController
{
    /**
     * 上传图片
     */
    public function upload_images(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './UploadsImg/'; // 设置附件上传根目录
        $upload->savePath  =     '';
        $upload->subName  =     array('date','Ymd'); // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->upload_error($upload->getError());
        }else{// 上传成功
            $data=[];
            foreach($info as $file){
                $url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];

                $data[] = $url.'/UploadsImg/'.$file['savepath'].$file['savename'];
            }
            $this->succeedReturn($data);
        }
    }

    /**
     * 上传视频
     */
    public function upload_video(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     31457280 ;// 设置附件上传大小
        $upload->exts      =     array('avi', 'mp4', 'flv', '3gp','rmvb');// 设置附件上传类型
        $upload->rootPath  =     './UploadsVideo/'; // 设置附件上传根目录
        $upload->savePath  =     '';
        $upload->subName  =     array('date','Ymd'); // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->upload_error($upload->getError());
        }else{// 上传成功
            $data=[];
            foreach($info as $file){
                $data[]='/UploadsVideo/'.$file['savepath'].$file['savename'];
            }
            $this->succeedReturn($data);
        }
    }

    /**
     * 上传音频
     */
    public function upload_audio(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     11457280 ;// 设置附件上传大小
        $upload->exts      =     array('wav', 'mp3');// 设置附件上传类型
        $upload->rootPath  =     './UploadsAudio/'; // 设置附件上传根目录
        $upload->savePath  =     '';
        $upload->subName  =     array('date','Ymd'); // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
        if(!$info) {// 上传错误提示错误信息
            $this->upload_error($upload->getError());
        }else{// 上传成功
            $data=[];
            foreach($info as $file){
                $data[]='/UploadsAudio/'.$file['savepath'].$file['savename'];
            }
            $this->succeedReturn($data);
        }
    }
    public function delFile($url){

      $url = '/'.explode('.com/',$url)[1];
      if(!empty($url)){
          if (unlink(".".$url)) { //删除本地文件
              $this->succeedReturn();
          }else{
              $this->succeedReturn();
          }
      }
    }
    /**
     * 删除文件
     */
    public function delUpload($url){
        $url = I("url",'');
        if(!empty($url)){
            if (unlink(".".$url)) { //删除本地文件
                $this->succeedReturn();
            }else{
                $this->error302();
            }
        }
    }
}
