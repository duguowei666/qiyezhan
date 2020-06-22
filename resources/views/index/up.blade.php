<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="/css/css.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="pageTop">
        <div class="page">
            <img src="img/coin02.png" />
            <span><a href="#">首页</a>&nbsp;-&nbsp;
                <a href="#">导航栏管理</a>&nbsp;-
            </span>&nbsp;修改管理
        </div>
    </div>
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>导航栏</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    <input type="hidden"  name="id" value="{{$data->id}}"/>
                    导航栏名称：<input type="text" class="input1" name="name" value="{{$data->name}}" />
                </div>
                <div class="bbD">
                    链接地址：<input type="text" class="input1" name="url" value="{{$data->url}}"/>
                </div>

                <div class="bbD">
                    是否显示：
                    <label>
                        <input type="radio"  value="1" name="hidden" checked />是</label>
                    <label><input type="radio" value="2" name="hidden" />否</label>
                </div>
                <div class="bbD">
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;排序：

                    <input class="input2" type="text" name="sorts" value="{{$data->sorts}}" />
                </div>
                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" href="#" id="btn">修改</button>
                        <a class="btn_ok btn_no" href="#">取消</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>
</html>
<script>
    $(document).ready(function () {
        $(document).on('click','#btn',function () {
            var data = {};
            data.id = $("input[name='id']").val();
            data.name = $("input[name='name']").val();
            data.url = $("input[name='url']").val();
            data.hidden = $("input[name='hidden']").val();
            data.sorts = $("input[name='sorts']").val();

            var url = '/do_up';
            $.ajax({
                type:'post',
                data:data,
                url:url,
                dataType:'json',
                success:function (res) {
                    if(res.success == true){
                        var url = res.url
                        window.location.href = url;
                    }
                }
            })
        })
    })
</script>