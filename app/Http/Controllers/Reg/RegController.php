<?php

namespace App\Http\Controllers\Reg;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\ZhuCeModel;
class RegController extends Controller
{
    public function reg(){
        $res = DB::table('role')->get();
        return view('reg.index',['data'=>$res]);
    }
    public function do_reg(Request $request){
        $r_id = $request -> r_id;
        $name = $request -> post('name');
        $pwd = $request -> post('pwd');
        $data = [
            'name'  => $name,
            'pwd'   => $pwd
        ];
        $res = DB::table('zhuce')->insert($data);

        $user_id = DB::table("zhuce")->where("name",$name)->value("id");
        $info = [
            "rid"=>$r_id,
            "uid"=>$user_id
        ];
        $data = DB::table("userrole")->insert($info);
        if($res){
            echo "<script>alert('成功');location='/login'</script>";
        }else{
            echo "<script>alert('失败');location='/reg'</script>";
        }


    }
    public function login(){
        return view('reg/login');
    }
    public function do_login(){
        $name = \request() -> name;
        $pwd = \request() -> pwd;
        $where = [
            'name' => $name
        ];
        $res = DB::table('zhuce')->where($where)->first();
//        var_dump($res);die;
        foreach ($res as  $v){
//            var_dump($v);die;
            if($v['name'] != $name & $v['pwd'] != $pwd){
                echo "<script>alert('账号密码有误');location='/login'</script>";
            }else{
                session(['name'=>$name,'id'=>$res->id]);
                echo "<script>alert('登陆成功');location='/'</script>";
            }
        }
    }
    public function role(){
        $res = DB::table("priv")->get();
        return view('reg.add',['data'=>$res]);
    }
    public function addrole(Request $request){
        $name = \request() -> r_name;
        $p_id = \request() -> input('p_id');
        $data = [
            'r_name'  => $name,
            'is_del' => 1
        ];
        $res = DB::table('role')->insert($data);

        $r_id = DB::table('role')->where(['r_name'=>$name])->value('r_id');

        $datainfo = [
            'pid' => $p_id,
            'rid' => $r_id
        ];

        $res = DB::table('privlist')->insert($datainfo);

        if($res){
            echo "<script>alert('成功');location='/rolelist'</script>";
        }else{
            echo "<script>alert('失败');location='/role'</script>";
        }
    }
    public function rolelist(){
        $info = DB::table('privlist')->join('priv','privlist.pid','=','priv.id')->get();

        $res = DB::table('role')->where(['is_del'=>1])->get();

        return view('reg.rolelist',['data'=>$res,'info'=>$info]);
    }
    public function up($id){
        $res = DB::table('role')->where(['r_id'=>$id])->first();
        return view('reg.up',['data'=>$res]);
    }
    public function do_up(){
        $r_id = \request()->r_id;
        $r_name = \request() -> r_name;
        $data = [
            'r_name'    => $r_name
        ];
        $res = DB::table('role')->where(['r_id'=>$r_id])->update($data);
        if($res){
            echo "<script>alert('成功');location='/rolelist'</script>";
        }else{
            echo "<script>alert('失败');location='/rolelist'</script>";
        }
    }
    public function priv(){
        return view('reg.priv');
    }
    public function do_priv(){
        $data = \request() -> all();
        $data = [
            'p_name'=>$data['p_name'],
            'url'   => $data['url'],
            'is_del'=>1
        ];
        $res = DB::table('priv')->insert($data);
        if($res){
            echo "<script>alert('成功');location='/privlist'</script>";
        }else{
            echo "<script>alert('失败');location='/priv'</script>";
        }
    }
    public function privlist(){
        $res = DB::table('priv')->where(['is_del'=>1])->get();
        return view('reg.privlsit',['data'=>$res]);
    }
}
