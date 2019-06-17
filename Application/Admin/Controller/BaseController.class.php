<?php
namespace Admin\Controller;
use Think\Controller;

class BaseController extends  Controller
{

    public function __construct(){
        parent::__construct();
        $arr_controller_action=session("gongneng");
        if(empty($arr_controller_action)){
            // $this->redirect("Login/loginOut");
        }

        $Common_controller_action[]="Common/upload_images";
        $Common_controller_action[]="Common/upload_video";
        $Common_controller_action[]="Common/upload_audio";
        $Common_controller_action[]="Common/delUpload";
        $Common_controller_action[]="Index/index";
        $Common_controller_action[]="Index/home";
        $arr_controller_action=array_merge($arr_controller_action,$Common_controller_action);

        $http_url=CONTROLLER_NAME."/".ACTION_NAME;

        // 关闭权限验证

        // if(!in_array($http_url,$arr_controller_action)){
        //     if(IS_POST){
        //         $this->error301("没有权限额!");
        //     }else {
        //         $this->redirect('Error/index');
        //     }
        // }
    }

    /**
     * @param string $msg
     * 参数错误
     */
    public function error300($msg='参数错误!'){
        $this->ajaxReturn(["code"=>300,"msg"=>$msg]);
    }

    /**
     * @param string $msg
     * 其他错误
     */
    public function error301($msg='其他错误!'){
        $this->ajaxReturn(["code"=>301,"msg"=>$msg]);
    }

    /**
     * @param string $msg
     * 系统错误
     */
    public function error302($msg='系统错误，请联系开发者！'){
        $this->ajaxReturn(["code"=>302,"msg"=>$msg]);
    }

    /**
     * @param string $msg
     * 非法操作
     */
    public function error303($msg='非法操作！'){
        $this->ajaxReturn(["code"=>303,"msg"=>$msg]);
    }

    /**
     * @param array $data
     * @param string $count
     * 成功
     */
    public function succeedReturn($data=[],$count=''){
        if($count===''){
            $this->ajaxReturn(["code" => 0, "msg" => "成功！", "data" => $data]);
        }else {
            $this->ajaxReturn(["code" => 0, "msg" => "成功！", "data" => $data, "count" => $count]);
        }
    }

    /**
     * 空方法
     */
    public function _empty(){
        $this->ajaxReturn(["code"=>304,"msg"=>"访问地址不存在！"]);
    }


    /**
     * 305
     * @param string $msg
     * 上传出错
     */
    public function upload_error($msg='上传失败！'){
        $this->ajaxReturn(["code"=>305,"msg"=>$msg]);
    }


    /**
     * 微信退款
     * @param $data ["transaction_id"=>"微信返回的单号"，"total_fee"=>"总支付金额"，"refund_fee"=>"退款金额","out_refund_no"=>"退款单号"]
     * @return \成功时返回
     */
    protected function wxOut($data){
        import("Vendor.wx_pay.lib.WxPay#Api","",".php");
        $input = new \WxPayRefund();
        $input->SetTransaction_id($data["transaction_id"]);
        $input->SetTotal_fee($data["total_fee"]*100);
        $input->SetRefund_fee($data["refund_fee"]*100);
        $input->SetOut_refund_no($data["out_refund_no"]);
        $input->SetSignType("MD5");//加密

        $sslCertPath = APP_PATH .'../cert/apiclient_cert.pem';
        $sslKeyPath = APP_PATH .'../cert/apiclient_key.pem';
        $config_value["cer_path"] = $sslCertPath;
        $config_value["key_path"] = $sslKeyPath;
        $config_value["app_id"] = C('WX_PAY')['app_id'];
        $config_value["mch_id"] = C('WX_PAY')['mch_id'];
        $config_value["key"] = C('WX_PAY')['key'];
        $config_value["app_secret"] = C('WX_PAY')['app_secret'];

        $result=$this->getWxOut($input,$config_value);
        return $result;

    }

    /**
     * @param $input
     * @param $config_value
     * @return \成功时返回
     * 退款
     */
    private function getWxOut($input,$config_value){
        import("Vendor.wx_pay.WxPay#Config","",".php");
        try{
            $config = new \WxPayConfig();
            $config->setValue($config_value);
            $input->SetOp_user_id($config->GetMerchantId());
            return \WxPayApi::refund($config, $input);
        } catch(Exception $e){
            return $e;
        }
    }






}
