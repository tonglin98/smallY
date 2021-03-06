<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>登陆 - 管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="__ADMIN__/layui/css/layui.css" media="all">
    <script>
        if(window.parent!=this.window){
            window.parent.location.href="<?php echo U('Admin/Login/login');?>";
        }
    </script>
    <script src="__ADMIN__/layui/layui.js"></script>
    <style>
        .layadmin-user-login{
            position: relative;
            left: 0;
            top: 0;
            padding: 150px 0;
            min-height: 100%;
            box-sizing: border-box;
        }
        .layadmin-user-login-main,form{
            width: 375px;
            margin: 0 auto;
            box-sizing: border-box;
        }
        .layadmin-user-login-header {
            text-align: center;
        }
        .layadmin-user-login-box {
            padding: 20px;
        }
        .layadmin-user-login-body .layui-form-item {
            position: relative;
        }
        .layui-form-item {
            margin-bottom: 25px;
            clear: both;
        }

        .layadmin-user-login-body .layui-form-item .layui-input {
            padding-left: 38px;
        }

        .layui-input {
            display: block;
            width: 100%;
            padding-left: 10px;
        }
        .layui-input {
            height: 38px;
            line-height: 1.3;
            line-height: 38px\9;
            border-width: 1px;
            border-style: solid;
            background-color: #fff;
            border-radius: 2px;
        }
        .layadmin-user-login-footer{
            position: absolute;
            bottom:0px;
            /*background: linear-gradient(to right,#029789, #ffffff);*/
            padding: 10px 10px;
            width: 100%;
            height: 50px;
        }
        body{
            overflow: hidden;
            position: absolute;
            top:0;
            left:0;
            right: 0;
            bottom:0;
        }
        #LAY-user-login{
            background-image: url("/Public/admin_status/img/login4.jpg");
            background-size: cover;
        }
        #LAY-user-login p{
            line-height: 30px;
            font-weight: bold;
        }
        .layui-form{
            border: 5px solid #eb580f;
            border-image: linear-gradient(to bottom right,#eb580f, #ffffff) 30 30;
            padding: 20px;
            float: right;
            margin-right: 200px;
            background: linear-gradient(to right, #eb580f, #ffffff);
        }
        .layui-btn-fluid{
            background-color: #eb580f;
        }
    </style>
</head>
<body>
<div class="layadmin-user-login layadmin-user-display-show" id="LAY-user-login" style="" >
    <form class="layui-form layui-form-pane" action="" lay-filter="example">
        <div class="layadmin-user-login-box layadmin-user-login-header">
            <h2>后台管理</h2>
            <p>京剧后台管理系统登陆</p>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input type="text" name="name" lay-verify="title" value="" autocomplete="off" placeholder="请输入用户名" class="layui-input">
            </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密&ensp;&ensp;码</label>
            <div class="layui-input-block">
                <input type="password" name="pwd" lay-verify="title" autocomplete="off" placeholder="请输入密码" class="layui-input">
            </div>
        </div>

        <div class="layui-form-item">
            <div class="layui-input-block" style="margin-left: 0px">
                <button class="layui-btn layui-btn-fluid" lay-submit="" lay-filter="demo1">立即提交</button>
            </div>
        </div>
        <p>谢谢支持</p>
        <p>特昌科技有限公司 手机：18580163298</p>
        <p>技术支持： 特昌科技有限公司·技术部</p>
    </form>

    <div class="layui-trans layadmin-user-login-footer">
        <p>© 2018 <span>T-song</span></p>
        <p>
            <span>谢谢合作：2019.05.06 特昌科技有限公司 手机：18580163298</span>
        </p>
    </div>
</div>

<script>
    var url_login="<?php echo U('Admin/Login/login');?>";//添加修改
    layui.use(['form', 'layedit', 'laydate','upload'], function(){
        var form = layui.form
            ,layer = layui.layer
            ,layedit = layui.layedit
            ,laydate = layui.laydate
            ,$ = layui.jquery
            ,upload = layui.upload
            ,ii='';
    //自定义验证规则
    form.verify({
        title: function(value){
            if(value.length < 1){
                return '请先输入信息';
            }
        }
        ,sort:[/(\d)$/, '只支持数字!']
        ,file:function(value){
            if(value.length<1){
                return '请选择图片';
            }
        }
    });
    //监听提交
    form.on('submit(demo1)', function(data){
        $.post(url_login, data.field, function (data_v) {
            console.log(data_v);
            if(data_v.code===0){
                localStorage.setItem("name", data_v.data.name);
                localStorage.setItem("id", data_v.data.id);
                location.href = "<?php echo U('admin/Index/index');?>"; //后台主页
            }else{
                layer.alert(data_v.msg, {icon: 5});
            }
        },"json");
        return false;
    });
    //监听指定开关
    form.on('switch(switchTest)', function(data){
        layer.msg('开关checked：'+ (this.checked ? 'true' : 'false'), {
            offset: '6px'
        });
        layer.tips('温馨提示：请注意开关状态的文字可以随意定义，而不仅仅是ON|OFF', data.othis)
    });

    //监听提交
    form.on('submit(demo2)', function(data){
        alert(data.field);
        return false;
        $.post(url+'admin/News/newsAdd', data.field, function (data_v) {
            if(data_v.code==0){
                layer.msg('操作成功！', {icon: 1,time:2000});
                layer.open({
                    content: '操作成功'
                    ,icon: 1
                    ,btn: ['返回列表', '继续操作']
                    ,yes: function(index, layero){
                        //按钮【按钮一】的回调
                        history.go(-1);
                    }
                    ,btn2: function(index, layero){
                        //按钮【按钮二】的回调
                        //return false 开启该代码可禁止点击该按钮关闭
                        window.location.reload();
                    }
                    ,cancel: function(){
                        //右上角关闭回调
//                            return false; 开启该代码可禁止点击该按钮关闭
                    }
                });
            }else{
                layer.msg('操作失败！', {icon: 5,time:2000});
            }
        }, "json");
        return false;
    });

    });
</script>
</body>
</html>