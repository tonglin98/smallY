<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script src="/Public/admin_status/layui/layui.js"></script>
    <link rel="stylesheet" href="/Public/admin_status/layui/css/layui.css">
  </head>
  <body>
  <form class="layui-form" action="<?php echo U($result['exec']);?>" method="post">

  <div class="layui-form-item">
    <label class="layui-form-label">banner链接</label>
    <div class="layui-input-block">
      <input value="<?php echo ($result['http_url']); ?>" type="text" name="http_url" required  lay-verify="required" placeholder="请输入banner链接" autocomplete="off" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item">
    <label class="layui-form-label">输入框</label>
    <div class="layui-input-inline">
      <input value="<?php echo ($result['img_url']); ?>" id="img_input" type="text" name="img_url" required  lay-verify="required" placeholder="资源路径" autocomplete="off" class="layui-input">
    </div>

    <button type="button" class="layui-btn layui-input-inline" id="choose_img">
      <i class="layui-icon">&#xe67c;</i>上传图片
    </button>
    <br>
    <img height="80" id='img_show' src="<?php echo ($result['img_url']); ?>" alt="">
  </div>


  <div class="layui-form-item">
    <div class="layui-input-block">
      <button name="id" value="<?php echo ($result['id']); ?>" class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>

  <script>

  //Demo
  layui.use(['form','upload','layer'], function(){
    var form = layui.form;
    var upload = layui.upload;
    var layer = layui.layer;
    var $ = layui.jquery;

    var beforImg = '<?php echo ($result['img_url']); ?>';
    // //监听提交
    // form.on('submit(formDemo)', function(data){
    //   layer.msg(JSON.stringify(data.field));
    //   return false;
    // });

    //执行实例
    var uploadInst = upload.render({
      elem: '#choose_img' //绑定元素
      ,url: '/Admin/Common/upload_images' //上传接口
      ,done: function(res){
        console.log(res);
        if(res.code == 0){
          $('#img_show').attr('src',res.data[0]);
          $('#img_input').val(res.data[0]);
          layer.msg('图片上传成功！');
        }else{
          layer.msg('图片上传失败！');
        }
      }
      ,error: function(){
        layer.msg('图片上传失败！');
      }
    });

  });
  </script>
  </body>
</html>