<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/9 0009
 * Time: 09:54
 * 商品分类
 */

namespace Admin\Controller;
class InfoController extends BaseController{

    // 路径参数准备
    private $path_url = [
      'url_list'=>'Info/list',
      'url_add_up'=>'Info/up_or_add',
      'url_del'=>'Info/del',
      'exec'=>'Info/exec'

    ];

    private $tb = 'Info';
    /**
     * 列表
     */
    public function list(){
        if(IS_POST) {
            $page = I("page", "1");
            $limit = I("limit", "10");
            $type = I("type", 1);
            $key = I("key", "");
            $status = I("status", "");

            $where = [];

            if(!empty($key)){
              $where['sm_user.nickname'] = ['like',"%$key%"];
            }
            if(!empty($status)){
              $where['sm_info.status'] = $status - 1;
            }

            $nowtable = M($this->tb);

            $result = $nowtable
                      ->where($where)
                      ->field('sm_info.*,sm_user.nickname,sm_release_type.title')
                      ->join('sm_user on sm_user.id = sm_info.uid')
                      ->join('sm_release_type on sm_release_type.id = sm_info.info_type_id')
                      ->limit(($page-1) * $limit,$limit)
                      ->select();

            foreach ($result as $key => $value) {
              $result[$key]['add_time'] = date('Y-m-d H:i:s',$value['add_time']);
            }
            $count = $nowtable
                      ->where($where)
                      ->join('sm_user on sm_user.id = sm_info.uid')
                      ->join('sm_release_type on sm_release_type.id = sm_info.info_type_id')
                      ->count();


            $this->succeedReturn($result,$count);
        }else{
            $this->assign('URL_PATH',$this->path_url);
            $this->assign("type",I("type",1));
            $this->display();
        }
    }
    // 执行 操作，修改或者添加
    public function exec(){
      $data=I("post.");

      $nowtable = M($this->tb);

      if(isset($data["id"]) && !empty($data["id"])) { //修改
          // 获取修改的idea
          $up_id = $data["id"];
          unset($data['id']);

          $data["add_time"]=time();
          // 修改数据
          $res = $nowtable->where(['id'=>$up_id])->save($data);
          // 如果修改成功
          if($res) {
            $this->success('修改成功！','up_or_add/id/'.$up_id);
          }else {
            $this->error('修改失败！','up_or_add/id/'.$up_id);
          }
      }else{ //添加
          $data["add_time"]=time();
          $result = $nowtable->add($data);
          if($result){
            $this->success('添加成功！','up_or_add');
          }else{
            $this->error('添加失败！','up_or_add');
          }
      }
    }
    /**
     * 添加修改
     */
    public function up_or_add(){
        $type = I('type','0');
        // 注释   0 代表查询数据
        //
        if(IS_POST) {
            $data=I("post.");

            $nowtable = M($this->tb);

            if(isset($data["id"]) && !empty($data["id"])) { //修改
                // 获取修改的idea
                $up_id = $data["id"];
                unset($data['id']);

                $data["add_time"]=time();
                // 修改数据
                $res = $nowtable->where(['id'=>$up_id])->save($data);
                // 如果修改成功
                if($res) {
                  exit(json_encode(['code'=>'0','msg'=>'修改成功']));
                }else {
                  exit(json_encode(['code'=>'-1','msg'=>'修改失败']));
                }
            }else{ //添加
                $data["add_time"]=time();
                $result = $nowtable->add($data);
                if($result){
                  $this->success('添加成功！','up_or_add');
                }else{
                  $this->success('添加失败！','up_or_add');
                }
            }
        }else{
            $id=I("id","");
            if(!empty($id)) {
                // 如果id 不为空 那么 代表修改 修改
                $result = M($this->tb)->find($id);
                $result['exec'] = $this->path_url['exec'];
                $this->assign("result",$result);

            }else {
                // 如果id 为空 那么 代表添加
            }
            $this->display();
        }
    }
    // 检查数据
    public function checkData(){
        $id=I("id","");
        $status=I("status","");


        $res = M($this->tb)->where(['id'=>$id])->save(['status'=>$status,'auditors_id'=>1]);
        // 如果审核通过
        if($status == 1 && $res){
          // 发送消息

        }else if($res){

        }

        exit(json_encode(['code'=>0]));
    }
    /**
     * 删除
     */
    public function del(){
        $id=I("id","");
        if(!empty($id)){
            // 删除之前 删除该资源
            $resource = M($this->tb)->find($id);
            $img = $resource['img_url'];


            $res = M($this->tb)->delete($id);

            if($res){
            }else{
              exit(json_encode(['code'=>-1,'msg'=>'删除失败！']));
            }

        }else{
            exit(json_encode(['code'=>0,'msg'=>'删除失败！']));
        }
    }
}
