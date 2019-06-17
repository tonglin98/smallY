<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/9 0009
 * Time: 09:54
 * 登录
 */

namespace Admin\Controller;
use Think\Controller;

class LoginController extends Controller{

    /**
     * 登录
     */
    public function login(){
        if(IS_POST) {
            $admin = D("Admin");
            $data = I("post.");
            if ($admin->create($data, 4)) {
                $data["pwd"] = md5("xs".md5($data["pwd"]));
                $result_one = $admin->getOne(["a.name" => $data["name"], "a.pwd" => $data["pwd"]], "r.privilege,a.special");
                if (empty($result_one)) {
                    $this->ajaxReturn(["code" => 301, "msg" => "用户名或密码错误", "data" => ""]);
                }
                $privilege = D("Privilege");
                if ($result_one["special"] == 1) {
                    $result = $privilege->getSelect(["status" => 1], "id,title,path_name,path,pid,type,icon", "pid asc,sort desc");
                } else {
                    $privilege_arr = json_decode($result_one["privilege"],true);
                    $result = $privilege->getSelect(["status" => 1, "id" => ["in", $privilege_arr]], "id,title,path_name,path,pid,type,icon", "pid asc,sort desc");
                }
                $gongneng = [];
                $caidan = [];
                $caidan_key = [];
                $i = 0;
                foreach ($result as $v) {
                    if ($v["type"] == 2) {
                        if ($v["pid"] == 0) {
                            $caidan[] = $v;
                            $caidan_key[$v["id"]] = $i;
                            $i++;
                        } else {
                            $caidan[$caidan_key[$v["pid"]]]["child"][] = $v;
                            $gongneng[] = $v["path_name"];
                        }
                    } else {
                        $gongneng[] = $v["path_name"];
                    }
                }
                session("gongneng", $gongneng);
                session("caidan", $caidan);
                session("name", $data["name"]);
                $this->ajaxReturn(["code" => 0, "msg" => "成功", "data" => ""]);
            } else {
                $this->ajaxReturn(["code" => 300, "msg" => $admin->getError(), "data" => ""]);
            }
        }else{
            $this->display();
        }
    }

    /**
     * 退出登录
     */
    public function loginOut(){
        session("gongneng", null);
        session("caidan", null);
        exit("<script>window.parent.location.replace('/Admin/Login/login.html')</script>");
    }


}