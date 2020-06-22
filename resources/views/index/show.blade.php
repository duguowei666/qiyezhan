<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>广告-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="js/page.js" ></script> -->
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">公共管理</a>&nbsp;-</span>&nbsp;意见管理
        </div>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <div class="banner">

            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">序号</td>

                        <td width="308px" class="tdColor">名称</td>
                        <td width="450px" class="tdColor">链接</td>
                        <td width="215px" class="tdColor">是否显示</td>
                        <td width="180px" class="tdColor">排序</td>
                        <td width="125px" class="tdColor">操作</td>
                    </tr>
                    @foreach($data as $k => $v)
                    <tr  id="{{$v->id}}">
                        <td>{{$v->id}}</td>
                        <td>{{$v->name}}</td>
                        <td>{{$v->url}}</td>
                        <td>
                           {{$v->hidden ==1 ? '是' : '否'}}
                        </td>
                        <td field="name">
                            <span class="span">{{$v->sorts}}</span>
                            <input type="text" value="{{$v->sorts}}" class="changeValue" style="display: none;">
                        </td>
                        <td>

                            <a href="{{url('/up/'.$v->id)}}">
                                <img class="operation up" src="img/update.png" >
                            </a>
                                <img class="operation delban" data-id="{{$v->id}}" src="img/delete.png">
                        </td>
                    </tr>
                    @endforeach
                </table>
                <div class="paging">{{$data->links()}}</div>
            </div>
            <!-- banner 表格 显示 end-->
        </div>
        <!-- banner页面样式end -->
    </div>

</div>


<!-- 删除弹出框 -->
<div class="banDel">
    <div class="delete">
        <div class="close">
            <a><img src="img/shanchu.png" /></a>
        </div>
        <p class="delP1">你确定要删除此条记录吗？</p>
        <p class="delP2">
            <a href="#" class="ok yes">确定</a><a class="ok no">取消</a>
        </p>
    </div>
</div>
<!-- 删除弹出框  end-->
</body>

<script type="text/javascript">
    $(".delban").click(function () {
        $(".banDel").show();
    })
    $(".yes").click(function () {
        var id = $(".delban").data("id");
        var data = {};
        data.id = id;
        var url = 'do_del';
        $.ajax({
            url:url,
            data:data,
            type:'post',
            dataType:'json',
            success:function (res) {
                if(res.success == true){
                    var url = res.url
                    window.location.href = url;
                }
         }
        })
    });
    $(".no").click(function () {
        $(".banDel").hide();
    })
    $(".span").click(function () {
        $(this).hide()
        $(this).next('input').show()
    })
    $(".changeValue").blur(function () {
        var _this = $(this)
        var value=_this.val();//获取新值
        var field=_this.parent("td").attr('field');//获取字段
        var id=_this.parents("tr").attr('id');//id

    })
</script>
</html>