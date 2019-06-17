/**
 * layer 验证
 * @param form
 */
function public_layer_verify(form){
    //自定义验证规则
    form.verify({
        title: function(value){
            if(value.length < 1){
                return '请填写完整数据';
            }
        }
        ,sort:[/^(\d)+$/, '请填写数字!']
        ,file:function(value){
            if(value.length<1){
                return '请选择要上传的文件';
            }
        }
        ,phone: function(value, item){
            var myreg=/^[1][3,4,5,7,8][0-9]{9}$/;
            if(!myreg.test(value)){
                return '手机号不正确';
            }
        }
        ,money:function(value,item){
            var money_zz=/^(([1-9]\d*)(\.\d{1,2})?)$|^(0\.0?([1-9]\d?))$/;
            if(!money_zz.test(value)){
                return '金额格式不正确';
            }
        }
    });
}

/**
 *
 * @param upload
 * @param $
 * @param url
 * 上传图片
 */
function public_layer_upload_img(upload,$,url) {
    //上传单图片
    upload.render({
        elem: '.upload_img'
        , url: url
        , accept: 'images'
        , size: 3072
        , multiple: false
        ,before: function(obj){
            layer.load(2,{"shade":0.3}); //上传loading
        }
        , done: function (res) {
            //上传完毕
            if (res.code == 0) {
                //var div = $(this.elem).parent("div").siblings(".public_style");
                var div = $(this.item).parent("div").siblings(".public_style");
                var img_url = div.find("img").attr("src");//原来的图片
                div.siblings("input[type='hidden']").val(res.data[0]);
                if (img_url == undefined || img_url.length < 1) { //原来没有图片
                    div.append('<img src="' + res.data[0] + '" alt="" class="layui-upload-img">'); //添加图片
                } else { //原来有图片
                    div.find("img").attr("src", res.data[0]);
                    $.post("{:U('Common/delUpload')}", {"url": img_url}, function (data) {
                        console.log(data)
                    }, "json");
                }
            } else {
                layer.msg(res.msg);
            }
            layer.closeAll('loading'); //关闭loading
        }
        ,error: function(index, upload){
            layer.closeAll('loading'); //关闭loading
        }
    });

    //上传多图片
    upload.render({
        elem: '.upload_imgs'
        , url: url
        , accept: 'images'
        , size: 3072
        , multiple: true
        ,before: function(obj){
            layer.load(2,{"shade":0.3}); //上传loading
        }
        , done: function (res) {
            //上传完毕
            if (res.code == 0) {
                //var div = $(this.elem).parent("div").siblings(".public_style");
                var div = $(this.item).parent("div").siblings(".public_style");
                var length = div.find("img").length;
                if (length < 4) {
                    var hidden_input = div.siblings("input[type='hidden']");
                    var str = '';
                    var str_url = '';
                    $.each(res.data, function (i, v) {
                        str += '<img src="' + v + '" alt="" class="layui-upload-img">';
                        str_url += "|" + v;
                    });
                    if (hidden_input.val() == '') {
                        hidden_input.val(str_url.substring(1));
                    } else {
                        hidden_input.val(hidden_input.val() + str_url);
                    }
                    div.append(str);
                } else {
                    layer.msg("只能上传4张！亲");
                }
            } else {
                layer.msg(res.msg);
            }
            layer.closeAll('loading'); //关闭loading
        }
        ,error: function(index, upload){
            layer.closeAll('loading'); //关闭loading
        }
    });
}

/**
 * layer 上传视频
 * @param upload
 * @param $
 * @param url
 */
function public_layer_upload_video(upload,$,url) {
    //上传单视频
    upload.render({
        elem: '.upload_video'
        , url: url
        , accept: 'video'
        , size: 20480
        , multiple: false
        ,before: function(obj){
            layer.load(2,{"shade":0.3}); //上传loading
        }
        , done: function (res,index, upload) {
            //上传完毕
            if (res.code == 0) {
                //var div = $(this.elem).parent("div").siblings(".public_style");
                var div = $(this.item).parent("div").siblings(".public_style");
                var hidden_input = div.siblings("input[type='hidden']");
                var img_url = div.find("video").attr("src");//原来的视频
                hidden_input.val(res.data[0]);
                if (img_url == undefined || img_url.length < 1) { //原来没有视频
                    div.append('<video src="' + res.data[0] + '" height="130" controls="controls"> </video>'); //添加图片
                } else { //原来有视频
                    div.find("video").attr("src", res.data[0]);
                    $.post("{:U('Common/delUpload')}", {"url": img_url}, function (data) {
                        console.log(data)
                    }, "json");
                }
            } else {
                layer.msg(res.msg);
            }
            layer.closeAll('loading'); //关闭loading
        }
        ,error: function(index, upload){
            layer.closeAll('loading'); //关闭loading
        }
    });
}


/**
 * layer 上传音频
 * @param upload
 * @param $
 * @param url
 */
function public_layer_upload_audio(upload,$,url) {
    //上传单视频
    upload.render({
        elem: '.upload_audio'
        , url: url
        , accept: 'audio'
        , multiple: false
        , size: 10240 //限制文件大小，单位 KB
        ,before: function(obj){
            layer.load(2,{"shade":0.3}); //上传loading
        }
        , done: function (res) {
            //上传完毕
            if (res.code == 0) {
                //var div = $(this.elem).parent("div").siblings(".public_style");
                var div = $(this.item).parent("div").siblings(".public_style");
                var hidden_input = div.siblings("input[type='hidden']");
                var img_url = div.find("audio").attr("src");//原来的音频
                hidden_input.val(res.data[0]);
                if (img_url == undefined || img_url.length < 1) { //原来没有视频
                    div.append('<audio src="' + res.data[0] + '" height="130" controls="controls"> </audio>'); //添加图片
                } else { //原来有视频
                    div.find("audio").attr("src", res.data[0]);
                    $.post("{:U('Common/delUpload')}", {"url": img_url}, function (data) {
                        console.log(data)
                    }, "json");
                }
            } else {
                layer.msg(res.msg);
            }
            layer.closeAll('loading'); //关闭loading
        }
        ,error: function(index, upload){
            layer.closeAll('loading'); //关闭loading
        }
    });
}

/**
 * 图片可删除
 * @param $
 * @param url
 */
function del_img($,url){
    //删除图片
    $("body").on("dblclick",".public_upload_div img",function(){
        var img_url=$(this).attr("src");
        var _this=$(this);
        $.post(url, {"url": img_url}, function (data) {
            if(data.code==0){
                var div=_this.parent("div");
                _this.remove();//删除元素
                var imgs=$(div).find("img");
                if(imgs.length>0) {
                    var str_url='';
                    $.each(imgs, function (i, v) {
                        str_url +="|"+$(v).attr("src");
                    });
                    $(div).prev("input[type='hidden']").val(str_url.substring(1));
                }else{
                    $(div).prev("input[type='hidden']").val('');
                }
            }
        }, "json");
    });
}

/**
 * 时间段
 * @param laydate
 */
function public_layer_date(laydate){
    //日期范围 年月日
    laydate.render({
        elem: '.start_end_data'
        ,type: 'date'
        ,range: true
    });

    //日期选择 年月日
    laydate.render({
        elem: '.start_data'
    });

    //日期选择 年月日 时分秒
    laydate.render({
        elem: '.start_datatime'
        ,type: 'datetime'
    });
}

/**
 * 提交数据
 * @param form
 * @param url_add_up  提交地址
 * @param url_list  //返回列表地址
 */
function public_layer_form(form,$,layer,url_add_up,url_list){
    //监听提交
    form.on('submit(demo)', function(data){
        layer.load(2,{"shade":0.3}); //加载loading
        $.post(url_add_up, data.field, function (data_v) {
            if(data_v.code==0){
                layer.open({
                    content: "操作成功"
                    ,icon: 1
                    ,btn: ['返回列表', '继续操作']
                    ,yes: function(index, layero){
                        //按钮【按钮一】的回调
                        window.location.href=url_list;
                    }
                    ,btn2: function(index, layero){
                        //按钮【按钮二】的回调
                        //return false 开启该代码可禁止点击该按钮关闭
                        window.location.reload();
                    }
                    ,cancel: function(){
                        //右上角关闭回调
                        //return false; 开启该代码可禁止点击该按钮关闭
                    }
                });
            }else{
                layer.msg(data_v.msg, {icon: 5,time:2000});
            }
            layer.closeAll('loading'); //关闭loading
        }, "json");
        return false;
    });
}

/**
 * 图片弹窗
 * @param $
 * @param layer
 */
function open_img($,layer){
    $("body .public_style").on("click","img",function(){
        var src_url=$(this).attr("src");
        layer.open(
            {
                "title":"图片",
                "offset": 'auto',
                "area": 'auto',
                "maxWidth":800,
                "maxheight":500,
                "shade":0.5,
                "closeBtn":1,
                "anim":2,
                "shadeClose":true,
                "type":1,
                "content":"<div style='max-height:100%;'><img style='max-height:100%;max-width:100%;margin: auto;display: block' src='"+src_url+"' /></div>"
            }
        );
    })
}





















