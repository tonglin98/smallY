<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>农业商城-后台管理</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/Public/admin_status/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/Public/admin_status/layui/css/admin.css" media="all">

    <script>
        /^http(s*):\/\//.test(location.href) || alert('请先部署到 localhost 下再访问');
    </script>
    <style>
        iframe{
            display: block;
            padding: 10px;
        }
    </style>
</head>
<body class="layui-layout-body" layadmin-themealias="red">

<div id="LAY_app">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <!-- 头部区域 -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item layui-hide-xs" lay-unselect>
                    <a href="http://jingju_web.techangkeji.com" target="_blank" title="前台">
                        <i class="layui-icon layui-icon-website"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect>
                    <a href="javascript:;" layadmin-event="refresh" title="刷新">
                        <i class="layui-icon layui-icon-refresh-3"></i>
                    </a>
                </li>
            </ul>
            <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <a href="javascript:;" class="fullscreen">
                        <i class="layui-icon layui-icon-screen-full"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect style="margin-right: 30px">
                    <a href="javascript:;">
                        <cite>欢迎您 <?php echo session('name');?></cite>
                    </a>
                    <dl class="layui-nav-child">
                        <dd class="loginOut" layadmin-event="logout" style="text-align: center;"><a>退出</a></dd>
                    </dl>
                </li>
            </ul>
        </div>

        <!-- 侧边菜单 -->
        <div class="layui-side layui-side-menu">
            <div class="layui-side-scroll">
                <div class="layui-logo" lay-href="home/console.html">
                    <span>农业-1973</span>
                </div>

                <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
                    <!-- <li data-name="home" class="layui-nav-item layui-nav-itemed">
                        <a href="javascript:;" lay-tips="控制台" lay-direction="2">
                            <i class="layui-icon layui-icon-home"></i>
                            <cite>控制台</cite>
                        </a>
                        <dl class="layui-nav-child">
                            <dd data-name="console" class="layui-this">
                                <a href="javascript:;" data-url="<?php echo U('Index/bb');?>" class="site-demo-active" data-type="tabAdd" data-v="0">控制台</a>
                            </dd>

                        </dl>
                    </li> -->

                    <li data-name="home" class="layui-nav-item ">
                        <a href="javascript:;" lay-tips="tip" lay-direction="2">
                            <i class="layui-icon layui-icon-home"></i>
                            <cite>首页</cite>
                        </a>
                        <dl class="layui-nav-child">
                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('ReleaseType/list');?>" class="site-demo-active" data-type="tabAdd" data-v="1-1">信息-分类</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('Info/list');?>" class="site-demo-active" data-type="tabAdd" data-v="2-1">信息-审核</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('User/list');?>" class="site-demo-active" data-type="tabAdd" data-v="2-2">用户</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('SearchHot/list');?>" class="site-demo-active" data-type="tabAdd" data-v="2-3">首页-热门搜索</a>
                          </dd>
                        </dl>
                    </li>

                    <li data-name="home" class="layui-nav-item ">
                        <a href="javascript:;" lay-tips="tip" lay-direction="2">
                            <i class="layui-icon layui-icon-username"></i>
                            <cite>用户管理</cite>
                        </a>
                        <dl class="layui-nav-child">
                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('UUser/list');?>" class="site-demo-active" data-type="tabAdd" data-v="1-2">用户端-用户</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('MUser/list');?>" class="site-demo-active" data-type="tabAdd" data-v="3-2">商户端-用户</a>
                          </dd>
                        </dl>
                    </li>


                    <li data-name="home" class="layui-nav-item ">
                        <a href="javascript:;" lay-tips="tip" lay-direction="2">
                            <i class="layui-icon layui-icon-layer"></i>
                            <cite>店铺管理</cite>
                        </a>
                        <dl class="layui-nav-child">


                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('MShop/list');?>" class="site-demo-active" data-type="tabAdd" data-v="3-3">店铺-管理</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('MShopApply/list');?>" class="site-demo-active" data-type="tabAdd" data-v="3-1">店铺-资质审核</a>
                          </dd>
                        </dl>
                    </li>

                    <li data-name="home" class="layui-nav-item ">
                        <a href="javascript:;" lay-tips="tip" lay-direction="2">
                            <i class="layui-icon layui-icon-fire"></i>
                            <cite>商品管理</cite>
                        </a>
                        <dl class="layui-nav-child">
                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('GoodsApply/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-1">商品-审核</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('Goods/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-2">商品-管理</a>
                          </dd>
                        </dl>
                    </li>

                    <li data-name="home" class="layui-nav-item ">
                        <a href="javascript:;" lay-tips="tip" lay-direction="2">
                            <i class="layui-icon layui-icon-dollar"></i>
                            <cite>交易管理</cite>
                        </a>
                        <dl class="layui-nav-child">
                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('UCharge/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-2">充值-订单</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('UWithdraw/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-3">用户提现-订单</a>
                          </dd>
                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('MWithdraw/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-4">商户提现-订单</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('Goods/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-2">保证金-订单</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('Order/list');?>" class="site-demo-active" data-type="tabAdd" data-v="5-1">一般商品-订单</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('UMyAdoptionCustom/list');?>" class="site-demo-active" data-type="tabAdd" data-v="5-2">定制认养-订单</a>
                          </dd>

                        </dl>
                    </li>

                    <li data-name="home" class="layui-nav-item ">
                        <a href="javascript:;" lay-tips="tip" lay-direction="2">
                            <i class="layui-icon layui-icon-set"></i>
                            <cite>参数设置</cite>
                        </a>
                        <dl class="layui-nav-child">

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('UIntegralType/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-3">积分-设置</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('Deduct/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-4">折扣-设置</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('UUserLevel/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-2">成长值-设置</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('UWithdrawSet/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-1">服务费-设置</a>
                          </dd>

                          <dd data-name="console" class="">
                            <a href="javascript:;" data-url="<?php echo U('CheckTarget/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-5">检测项-设置</a>
                          </dd>
                        </dl>
                    </li>


                    <li data-name="home" class="layui-nav-item ">
                        <a href="javascript:;" lay-tips="tip" lay-direction="2">
                            <i class="layui-icon layui-icon-home"></i>
                            <cite>标题</cite>
                        </a>
                        <dl class="layui-nav-child">
                            <dd data-name="console" class="">
                              <a href="javascript:;" data-url="<?php echo U('Demo/list');?>" class="site-demo-active" data-type="tabAdd" data-v="1-1">Demo测试</a>
                            </dd>

                            <dd data-name="console" class="">
                              <a href="javascript:;" data-url="<?php echo U('UUser/list');?>" class="site-demo-active" data-type="tabAdd" data-v="1-2">用户-用户管理</a>
                            </dd>

                            <!-- <dd data-name="console" class="">
                              <a href="javascript:;" data-url="<?php echo U('GoodsGroup/list');?>" class="site-demo-active" data-type="tabAdd" data-v="1-3">分组管理</a>
                            </dd> -->

                            <dd data-name="console" class="">
                              <a href="javascript:;" data-url="<?php echo U('GoodsModule/list');?>" class="site-demo-active" data-type="tabAdd" data-v="2-1">首页-模块管理</a>
                            </dd>

                            <dd data-name="console" class="">
                              <a href="javascript:;" data-url="<?php echo U('GoodsCategory/list');?>" class="site-demo-active" data-type="tabAdd" data-v="2-2">首页-分类</a>
                            </dd>

                            <dd data-name="console" class="">
                              <a href="javascript:;" data-url="<?php echo U('GoodsApply/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-1">商品-审核</a>
                            </dd>

                            <dd data-name="console" class="">
                              <a href="javascript:;" data-url="<?php echo U('Goods/list');?>" class="site-demo-active" data-type="tabAdd" data-v="4-2">商品-管理</a>
                            </dd>

                            <dd data-name="console" class="">
                              <a href="javascript:;" data-url="<?php echo U('MShopApply/list');?>" class="site-demo-active" data-type="tabAdd" data-v="3-1">店铺-审核</a>
                            </dd>

                            <dd data-name="console" class="">
                              <a href="javascript:;" data-url="<?php echo U('MUser/list');?>" class="site-demo-active" data-type="tabAdd" data-v="3-2">店铺-用户</a>
                            </dd>

                            <dd data-name="console" class="">
                              <a href="javascript:;" data-url="<?php echo U('MShop/list');?>" class="site-demo-active" data-type="tabAdd" data-v="3-2">店铺-管理</a>
                            </dd>



                        </dl>
                    </li>


                  <!-- <?php if(is_array($data)): foreach($data as $k=>$v): ?><li data-name="home" class="layui-nav-item ">
                            <a href="javascript:;" lay-tips="<?php echo ($v["title"]); ?>" lay-direction="2">
                                <i class="layui-icon <?php echo ($v["icon"]); ?>"></i>
                                <cite><?php echo ($v["title"]); ?></cite>
                            </a>
                            <dl class="layui-nav-child">
                                <?php if(is_array($v["child"])): foreach($v["child"] as $kk=>$vv): ?><dd data-name="console" class="">
                                        <a href="javascript:;" data-url="<?php echo ($vv["path"]); ?>" class="site-demo-active" data-type="tabAdd" data-v="<?php echo ($k); ?>-<?php echo ($kk); ?>"><?php echo ($vv["title"]); ?></a>
                                    </dd><?php endforeach; endif; ?>
                            </dl>
                        </li><?php endforeach; endif; ?> -->
                </ul>
            </div>
        </div>
        <!-- 页面标签 -->
        <div class="layadmin-pagetabs" id="LAY_app_tabs">
            <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
            <div class="layui-icon layadmin-tabs-control layui-icon-down">
                <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav" >
                    <li class="layui-nav-item" lay-unselect >
                        <a href="javascript:;"></a>
                        <dl class="layui-nav-child layui-anim-fadein" style="z-index:999;">
                            <dd class="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                            <dd class="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                            <dd class="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
            <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="demo" >
                <ul class="layui-tab-title" id="LAY_app_tabsheader">
                    <li lay-id="0"  class="layui-this"><i class="layui-icon layui-icon-home"></i></li>

                </ul>
                <!-- 主体内容 -->
                <div class="layui-body layui-tab-content" id="LAY_app_body">
                    <div class="layui-tab-item layui-show">
                        <iframe src="<?php echo U('Index/home');?>" frameborder="0" class="layadmin-iframe"></iframe>
                    </div>

                </div>
            </div>
        </div>



        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
</div>

<script src="/Public/admin_status/layui/layui.js"></script>
<script>
    layui.use('element', function(){
        var $ = layui.jquery, layer = layui.layer;
        var element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块
        //触发事件
        var active = {
            tabAdd: function(){
                var url=$(this).data('url'); //获取访问地址
                if(url!=null && url!=undefined && url!='') {
                    if(url.substring(0,10)=="/index.php"){
                        url=url.substring(10);
                    }
                    var id = $(this).attr("data-v");//获取id
                    if ($(".layui-tab li[lay-id='" + id + "']").length < 1) { //判断该id对应的页面是否存在
                        //不存在设置tab内容
                        var str = ' <iframe id="i1" src="' + url + '" frameborder="0"  class="layui-anim layui-anim-upbit layadmin-iframe"  name="i1"></iframe>';
                        //新增一个Tab项
                        element.tabAdd('demo', {
                            title: '<span>'+$(this).text()+'</span>' //设置tab标题
                            , content: str
                            , id: $(this).attr("data-v") //实际使用一般是规定好的id，这里以时间戳模拟下
                        });
                    }
                    element.tabChange('demo', $(this).attr("data-v")); //选中当前tab

                    //移动
                    var count_width=$("#LAY_app_tabsheader").width();
                    var count_li_count=0;
                    $.each($("#LAY_app_tabsheader").find("li"),function(i,v){
                        count_li_count+=$(v).width()+55;
                    });
                    if(count_li_count>count_width) {
                        var yu_width = count_li_count - count_width;
                        $("#LAY_app_tabsheader").css("left", -yu_width);
                    }
                }
            }
            ,tabDelete: function(othis){
                //删除指定Tab项
                element.tabDelete('demo', othis); //删除
                othis.addClass('layui-btn-disabled');
            }
            ,tabChange: function(){
                //切换到指定Tab项
                element.tabChange('demo', '22'); //切换到：用户管理
            }
        };

        $('.site-demo-active').on('click', function(){
            var othis = $(this), type = othis.data('type');
            active[type] ? active[type].call(this, othis) : '';
        });

        //Hash地址的定位
        var layid = location.hash.replace(/^#test=/, '');
        element.tabChange('test', layid);

        element.on('tab(test)', function(elem){
            location.hash = 'test='+ $(this).attr('lay-id');
        });

        //刷新
        $(".layui-icon-refresh-3").click(function(){
            var url=$("#LAY_app_body .layui-show").find("iframe")[0].src+"?rang="+Math.random();
            $("#LAY_app_body .layui-show").find("iframe")[0].src=url;
        });

        //关闭当前
        $("body .closeThisTabs").click(function(){
            $("#LAY_app_tabsheader").find("li:eq(0)").siblings("li[class='layui-this']").remove();
            $("#LAY_app_body").find("div:eq(0)").siblings("div .layui-show").remove();

            $("#LAY_app_tabsheader").find("li:eq(0)").addClass("layui-this");
            $("#LAY_app_body").find("div:eq(0)").addClass("layui-show");
        });

        //关闭其他
        $("body .closeOtherTabs").click(function(){
            $("#LAY_app_tabsheader").find("li:eq(0)").siblings("li:not([class='layui-this'])").remove();
            $("#LAY_app_body").find("div:eq(0)").siblings("div:not(.layui-show)").remove();
        });
        //关闭所有
        $("body .closeAllTabs").click(function(){
            $("#LAY_app_tabsheader").find("li:not([lay-id='0'])").remove();
            $("#LAY_app_tabsheader").find("li[lay-id='0']").addClass("layui-this");

            $("#LAY_app_body").find("div").eq(0).addClass("layui-show");
            $("#LAY_app_body").find("div:gt(0)").remove();
        });

        //回到前面
        $("body .layui-icon-prev").click(function(){
            $("#LAY_app_tabsheader").css("left",0);
        });

        //回到后面
        $("body .layui-icon-next").click(function(){
            var count_width=$("#LAY_app_tabsheader").width();
            var count_li_count=0;
            $.each($("#LAY_app_tabsheader").find("li"),function(i,v){
                count_li_count+=$(v).width()+55;
            });
            var yu_width=(Math.floor(count_li_count/count_width))*count_width;
            $("#LAY_app_tabsheader").css("left",-yu_width);
        });

        //退出登录
        $("body .loginOut").click(function(){
            window.location.href="<?php echo U('Login/loginOut');?>";
        });

        $("body .fullscreen").click(function(){
            var isFullscreen=document.fullScreen||document.mozFullScreen||document.webkitIsFullScreen;
            if(isFullscreen){ //缩小
                if(document.exitFullScreen){
                    document.exitFullscreen()
                }
	            //兼容火狐
                if(document.mozCancelFullScreen){
                    document.mozCancelFullScreen()
                }
                //兼容谷歌等
                if(document.webkitExitFullscreen){
                    document.webkitExitFullscreen()
                }
            	//兼容IE
                if(document.msExitFullscreen){
                    document.msExitFullscreen()
                }
                $(this).find("i").removeClass("layui-icon-screen-restore").addClass("layui-icon-screen-full");
            }else { //放大
                if (document.documentElement.RequestFullScreen) {
                    document.documentElement.RequestFullScreen();
                }
                //兼容火狐
                console.log(document.documentElement.mozRequestFullScreen)
                if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                }
                //兼容谷歌等可以webkitRequestFullScreen也可以webkitRequestFullscreen
                if (document.documentElement.webkitRequestFullScreen) {
                    document.documentElement.webkitRequestFullScreen();
                }
                //兼容IE,只能写msRequestFullscreen
                if (document.documentElement.msRequestFullscreen) {
                    document.documentElement.msRequestFullscreen();
                }
                $(this).find("i").removeClass("layui-icon-screen-full").addClass("layui-icon-screen-restore");
            }
        });

        function toggleFullScreen(e){
            var el=e.srcElement||e.target;//target兼容Firefox
            el.innerHTML=='点我全屏'?el.innerHTML='退出全屏':el.innerHTML='点我全屏';
            FullScreen(el);
        }
    });


</script>
</body>
</html>