<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>修改-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" /><span><a href="#">修改</a>&nbsp;-&nbsp;<a
                        href="#">角色修改</a>&nbsp;-</span>&nbsp;修改
        </div>
    </div>
    <div class="page ">
        <!-- 会员注册页面样式 -->
        <div class="banneradd bor">
            <div class="baTopNo">
                <span>修改</span>
            </div>
            <form action="/do_uprole" method="post">
                <div class="baBody">
                    <div class="bbD">
                        <input type="hidden" name="r_id" value="{{$data->r_id}}">
                        &nbsp;&nbsp;&nbsp;角色：<input type="text" class="input3" name="r_name" value="{{$data->r_name}}" />
                    </div>
                    <div class="bbD">
                        <p class="bbDP">
                            <button class="btn_ok btn_yes" name="btn">提交</button>
                            <a class="btn_ok btn_no" href="#">取消</a>
                        </p>
                    </div>
            </form>
        </div>
    </div>

    <!-- 会员注册页面样式end -->
</div>
</div>
</body>
</html>
