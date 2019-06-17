<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="/Public/admin_status/layui/layui.js"></script>
    <link rel="stylesheet" href="/Public/admin_status/layui/css/layui.css">
</head>
<body>
<div class="demoTable layui-form">
  <button class="layui-btn" data-type="add">&ensp;添&ensp;&ensp;加&ensp;</button>
  <div class="layui-input-inline">
    <input id="key-world" type="text" class="layui-input" name="" value="" placeholder="输入昵称匹配">
  </div>

  <div class="layui-input-inline">
    <select name="city" lay-verify="required" id="info_status">
      <option value="">检索类型</option>
      <option value="1">待审核</option>
      <option value="2">已通过</option>
      <option value="3">审核未通过</option>
    </select>
  </div>

  <button id="search_btn" onclick="" class="layui-btn" data-type="search">&ensp;搜&ensp;&ensp;索&ensp;</button>
</div>

<table class="layui-hide" id="LAY_table_user" lay-filter="demo"></table>
<script type="text/html" id="barDemo">
    <!-- <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> -->

    <a class="layui-btn layui-btn-xs" lay-event="del">审核</a>
</script>
<script type="text/html" id="status">
    <!-- <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a> -->

    {{d.status == 1?`<span class="layui-badge layui-bg-green">审核通过</span>`:
    d.status==2?`<span class="layui-badge layui-bg">审核未通过</span>`:`<span class="layui-badge layui-bg-orange">等待审核</span>`}}

</script>

<script type="text/html" id="img_url">

    <img src="{{d.img_url}}" lay-event='show-img' width="150px" style="display: inline-block"/>
</script>
<script>
    // 字段准备
    var filed = [
        {field:'id', title: 'ID',width:55,align:'center',  sort: true, fixed: true}
        ,{field: 'nickname',title:'用户昵称',align:'center'}
        ,{field: 'title',title:'发布类型',align:'center'}
        ,{field: 'main_text',title:'主题内容',align:'center'}
        ,{field: 'comments_num',title:'评论数',align:'center'}
        ,{field: 'point_ratio',title:'点赞数',align:'center'}
        ,{field: 'status',title:'状态',align:'center',toolbar:'#status'}
        ,{field: 'add_time',title:'创建时间',align:'center', sort: true}
        ,{title:'操作',align:'center',toolbar: '#barDemo',width:250,fixed: 'right'}
    ];

    var url_add_up= `<?php echo U($URL_PATH['url_add_up']);?>`;//添加修改
    var url_list= `<?php echo U($URL_PATH['url_list']);?>`; //列表
    var url_del= `<?php echo U($URL_PATH['url_del']);?>`;//删除


    layui.use(['table','laydate','layer'], function(){
      var layer = layui.layer;
        var table = layui.table,
                $=layui.jquery
                ,active = {
                    add:function(){ //添加
                        // 使用 layer 打开编辑框
                        layer.open({
                          type: 2,
                          title: `正在添加 `,
                          shadeClose: true,
                          shade: 0.8,
                          area: ['80%', '90%'],
                          content: url_add_up, //iframe的url
                          end: function () {
                            // 刷新当页
                            $(".layui-laypage-btn").click()
                            layer.msg('更新成功！')
                          }
                        });
                    }
                    ,reload:function(){ //搜索
                        var key=$("#key").val();
                        var time_v=$("#time_v").val();

                        //执行重载
                        table.reload('testReload', {
                            page: {
                                curr: 1 //重新从第 1 页开始
                            }
                            ,where: {
                                key: key
                                ,time_v: time_v
                            }
                        });
                    }
                };
        //方法级渲染
        table.render({
            skin: 'line' //行边框风格
            ,even: false //开启隔行背景
            ,elem: '#LAY_table_user'
            ,url: url_list
            ,cols: [filed]
            ,method:'post'
            ,id: 'testReload'
            ,page: true
        });

        // 注册响应事件
        $('#search_btn').on('click',function(){
          layer.msg('搜索');
          var key=$("#key-world").val();
          var status = $('#info_status').val();
          table.reload('testReload', {
              page: {
                  curr: 1 //重新从第 1 页开始
              }
              ,where: {
                  key: key,
                  status:status
              }
          });
        })

        //修改 删除
        table.on('tool(demo)', function(obj){
            var data = obj.data;
            var id= data.id;
            var title= data.title;
            if(obj.event === 'edit'){
                // 使用 layer 打开编辑框
                layer.open({
                  type: 2,
                  title: `正在编辑 ${id} `,
                  shadeClose: true,
                  shade: 0.8,
                  area: ['80%', '90%'],
                  content: url_add_up+"?id="+id, //iframe的url
                  end: function () {
                    // 刷新当页
                    $(".layui-laypage-btn").click()
                    layer.msg('更新成功！')
                  }
                });
            }else if(obj.event === 'show-img'){
              var img_url = obj.data.img_url;
                layer.open({
                   type: 1,
                   title: false,
                   closeBtn: 0,
                   shadeClose: true,
                   area: ['70%','70%'], //宽高
                   content: `<img width="100%" src="${img_url}" alt="">`
                });

            }else if(obj.event === 'guige'){
                window.location.href=url_guige_list+"?id="+id;
            }else if(obj.event === 'del'){
              var status = data.status;
              layer.confirm('请选择', {
                btn: ['选择处理类型', '通过', '不通过'] //可以无限个按钮
                ,btn3: function(index, layero){
                  layer.msg('222');
                  //按钮【按钮三】的回调
                  status = 2;
                  $.post('checkData', {"id":id,status:status}, function (data_v) {
                      if(data_v.code==0){
                          $(".layui-laypage-btn").click()
                      }else{
                          layer.msg(data_v.msg, {icon: 5,time:2000});
                      }
                  }, "json");
                }
              }, function(index, layero){

              }, function(index){
                layer.msg('审核通过！');
                status = 1;
                $.post('checkData', {"id":id,status:status}, function (data_v) {
                    if(data_v.code==0){
                        $(".layui-laypage-btn").click()
                    }else{
                        layer.msg(data_v.msg, {icon: 5,time:2000});
                    }
                }, "json");
              });



            }
        });
        //添加 搜索
        $('.demoTable .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
</script>
</body>
</html>