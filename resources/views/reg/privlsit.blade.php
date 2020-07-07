<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>广告-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <!-- <script type="text/javascript" src="/js/page.js" ></script> -->
    <style>
        .aaa nav ul{
            margin-left: 40%;

        }
        .aaa nav ul li .page-link{
            float: left;
            margin-left: 10px;
            width: 17px;
            height: 20px;
            background: #5bc0de;
            line-height: 20px;
            padding-left: 8px;
            color: #ffffff;
        }
        .show{
            padding-left: 70px;
            text-align: left;
        }

    </style>
</head>

<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="/img/coin02.png" /><span><a href="#">首页</a>&nbsp;-&nbsp;<a
                        href="#">导航栏管理</a>&nbsp;-</span>&nbsp;查看
        </div>
    </div>
    <div class="page">
        <!-- banner页面样式 -->
        <div class="banner">
            <!-- banner 表格 显示 -->
            <div class="banShow">
                <table border="1" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="66px" class="tdColor tdC">id</td>
                        <td width="315px" class="tdColor">权限名称</td>
                        <td width="308px" class="tdColor">权限路由</td>
                        <td width="125px" class="tdColor">操作</td>
                    </tr>
                    @foreach($data as $itme)
                        <tr>
                            <td>{{$itme->id}}</td>
                            <td class="show">{{$itme->p_name}}</td>
                            <td>{{$itme->url}}</td>
                            <td>
                                <a href="{{url('/admin/power/updates')}}?id={{$itme->id}}">
                                    <img class="operation updban"src="/img/update.png">
                                </a>
                                <img class="operation delban"src="/img/delete.png" banner_id="{{$itme->id}}">
                            </td>
                        </tr>
                    @endforeach
                </table>
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
            <a><img src="/img/shanchu.png" /></a>
        </div>
        <p class="delP1">你确定要删除此条记录吗？</p>
        <p class="delP2">
            <a class="ok yes" id="del">确定</a><a class="ok no">取消</a>
        </p>
    </div>
</div>
<!-- 删除弹出框  end-->
</body>

</html>

