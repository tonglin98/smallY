<?php
/**
 * Class playGoods
 * @package app\index\controller
 * 商品表
 */
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Date;

class IndexController extends BaseController
{
    /**
     * 左菜单
     */
    public function index(){
        $this->assign("data", session("caidan"));
        $this->display();
    }
    // 测试
    public function test(){
      $time = '1';
      echo (new Date($time))->magicInfo('XZ').'<br>';
      echo (new Date($time))->magicInfo('SX').'<br>';
      echo (new Date($time))->timeDiff(time(),'s').'<br>';
      echo (new Date(mktime(0, 0, 0, 12, 0, 2018 )));
    }


    /**
     * 图表
     */
    public function home(){
      exit('建设中。。。。。');


        // $playGoodsOrder=D("PlayGoodsOrder");
        // $rentGoodsOrder=D("RentGoodsOrder");
        // $userBrowse=D("UserBrowse");
        // //戏曲商品信息
        // // 2.已支付 3.已发货  5.退款中 6.已退款
        $play_status[2]=0;
        $play_status[3]=0;
        $play_status[5]=0;
        $play_status[6]=0;
        // $result_play_status=$playGoodsOrder->getStatusCount([2,3,5,6]);
        // if(!empty($result_play_status)){
        //     foreach($result_play_status as $v){
        //         switch($v["status"]){
        //             case 2:
        //                 $play_status[2]=$v["count"];
        //                 break;
        //             case 3:
        //                 $play_status[3]=$v["count"];
        //                 break;
        //             case 5:
        //                 $play_status[5]=$v["count"];
        //                 break;
        //             case 6:
        //                 $play_status[6]=$v["count"];
        //                 break;
        //         }
        //     }
        // }
        //
        //
        // //租赁商品信息
        // //1.未支付 2.已支付 3.已发货 4.已完成 5.已评价 6.退款中（退押金） 7.已退款（已退押金） 8.已取消
        $rent_status[2]=0;
        $rent_status[3]=0;
        $rent_status[6]=0;
        $rent_status[7]=0;
        // $result_rent_status=$rentGoodsOrder->getStatusCount([2,3,6,7]);
        // if(!empty($result_rent_status)){
        //     foreach($result_rent_status as $v){
        //         switch($v["status"]){
        //             case 2:
        //                 $rent_status[2]=$v["count"];
        //                 break;
        //             case 3:
        //                 $rent_status[3]=$v["count"];
        //                 break;
        //             case 6:
        //                 $rent_status[6]=$v["count"];
        //                 break;
        //             case 7:
        //                 $rent_status[7]=$v["count"];
        //                 break;
        //         }
        //     }
        // }
        // //每日用户浏览量
        // $start_time=time()-30*86400;
        // $where["create_time"]=[["gt",$start_time],["elt",time()],"or"];
        // $result_day=$userBrowse->getDayCount($where);
        // $day_arr=[];
        // $day_count=[];
        // if(!empty($result_day)){
        //     $day_arr=array_column($result_day,"year_day");
        //     $day_count=array_column($result_day,"count");
        // }
        //
        // //网站分类用户浏览
        // $result_type_day=$userBrowse->getTypeDayCount($where);
        //
        // $type_day=[];
        // //1.主页 2.戏曲用品 3.京剧摄影 4.演出服务 5.租赁服务 6.乐队伴奏 7.国粹教育
        // if(!empty($result_type_day)){
        //     foreach($result_type_day as $v) {
        //         switch($v["type"]){
        //             case 2:
        //                 $type_day[]=["name"=>"戏曲用品","value"=>$v["count"]];
        //                 break;
        //             case 3:
        //                 $type_day[]=["name"=>"京剧摄影","value"=>$v["count"]];
        //                 break;
        //             case 4:
        //                 $type_day[]=["name"=>"演出服务","value"=>$v["count"]];
        //                 break;
        //             case 5:
        //                 $type_day[]=["name"=>"租赁服务","value"=>$v["count"]];
        //                 break;
        //             case 6:
        //                 $type_day[]=["name"=>"乐队伴奏","value"=>$v["count"]];
        //                 break;
        //             case 7:
        //                 $type_day[]=["name"=>"国粹教育","value"=>$v["count"]];
        //                 break;
        //         }
        //     }
        // }
        // 查询出 所有的类别
        $all_goods_type = M('GoodsCategory')->field('id,name')->select();
        $all_goods_type_arr = [];

        foreach ($all_goods_type as $key => $value) {
          $all_goods_type_arr[$value['id']] = $value['name'];
        }

        // dump($all_goods_type_arr);
        // 用户 喜爱商品类型统计
        $user_like = M('GoodsOrder')
                        ->field('cate_id, count(cate_id) as cate_num')
                        ->join('ny_goods on ny_goods.id = ny_goods_order.goods_id')
                        ->join('ny_goods_category on ny_goods_category.id = ny_goods.cate_id')
                        ->group('cate_id')
                        ->select();

        // 统计最近一月的入住情况
        $shop_where['add_time'] = ['gt',strtotime(date('Y-m',time()).'-01')];

        $shop_stats = M('MShop')->where($shop_where)->select();

        // dump($shop_stats);
        // 统计最近一月的充值情况


        // dump($user_like);

        // 获取首页 banner
        $bannerList = M('Banner')->select();

        //戏曲
        $this->assign("banner_list",$bannerList);
        //戏曲
        $this->assign("play_status",$play_status);
        //租赁
        $this->assign("rent_status",$rent_status);
        //统计浏览
        $this->assign("day",json_encode(["day_title"=>[1,2,3],"day_value"=>[20,30,40]]));
        //类型统计
        foreach ($user_like as $key => $value) {
          $type_day[]=["name"=>$all_goods_type_arr[$value['cate_id']],"value"=>$value['cate_num']];
        }


        $this->assign("type_day",json_encode($type_day));
        $this->display();
    }

}
