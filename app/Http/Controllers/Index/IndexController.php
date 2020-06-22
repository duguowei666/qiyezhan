<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    public function index(){
        return view('index.index');
    }
    public function add(){
        return view('index.add');
    }
    public function do_add(Request $request){
        $arr = $request -> all();
        $data = [];
        $data['name'] = $arr['name'];
        $data['url'] = $arr['url'];
        $data['hidden'] = $arr['hidden'];
        $data['sorts'] = $arr['sorts'];
        $data['ctime'] = time();
        $bol = DB::table('banner')->insert($data);
        if($bol){
            $msg = [
                'success'       => true,
                'url'           => '/show',
                'msg'           => '成功'
            ];
            return json_encode($msg);
        }else{
            $msg = [
                'success'       => false,
                'url'           => '',
                'msg'           => '失败'
            ];
            return json_encode($msg);
        }
    }
    public function show(){
        $res = DB::table('banner')->where(['is_del'=>1])->orderByRaw('sorts desc')->paginate(2);
        return view('index/show',['data'=>$res]);
    }
    public function do_del(){
        $id = \request() -> id;
        $res = DB::table('banner')->where(['id'=>$id])->update(['is_del'=>2]);
        if($res){
            $msg = [
                'success'       => true,
                'url'           => '/show',
                'msg'           => '成功'
            ];
            return json_encode($msg);
        }else{
            $msg = [
                'success'       => false,
                'url'           => '',
                'msg'           => '失败'
            ];
            return json_encode($msg);
        }
    }
    public function up($id){

        $info = DB::table('banner')->where(['id'=>$id])->first();
        return view('index/up',['data'=>$info]);
    }
    public function do_up(){
        $arr = \request() -> all();
        $id = $arr['id'];
        $data = [];
        $data['name'] = $arr['name'];
        $data['url'] = $arr['url'];
        $data['hidden'] = $arr['hidden'];
        $data['sorts'] = $arr['sorts'];
        $data['ctime'] = time();
        $bol = DB::table('banner')->where(['id'=>$id])->update($data);
        if($bol){
            $msg = [
                'success'       => true,
                'url'           => '/show',
                'msg'           => '成功'
            ];
            return json_encode($msg);
        }else{
            $msg = [
                'success'       => false,
                'url'           => '',
                'msg'           => '失败'
            ];
            return json_encode($msg);
        }
    }
}
