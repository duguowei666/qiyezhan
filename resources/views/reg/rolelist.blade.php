<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>id</td>
            <td>角色</td>
            <td>权限</td>
            <td>操作</td>
        </tr>
        @foreach($data as $v)
        <tr>
            <td>{{$v->r_id}}</td>
            <td>{{$v->r_name}}</td>
            @foreach($info as $vv)
            <td>{{$vv->p_name}}</td>
            @endforeach
            <td>
                <a href="{{url('/uprole/'.$v->r_id)}}">编辑</a>
                {{--<a href="{{url('/priv/'.$v->r_id)}}">赋权限</a>--}}
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>