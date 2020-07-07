<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CateController extends Controller
{
    public function addcate(){
        return view('cate.addcate');
    }
    public function do_addcate(Request $request){
        $arr=$request->all();
        $sort=$arr['sort'];
        $hidden=$arr['hidden'];
        $data= [
            'cate_name'     => $sort,
            'hidden'        => $hidden,
            'createtime'      => time(),
            'is_del'        => 1
        ];
        //数据入库
        $res = DB::table('category')->insert($data);
        if($res){
            return $this->ajaxData(0005,'成功');
        }else{
            return $this->ajaxData(0004,'失败');
        }
    }
    public function catelist(){
        $res = DB::table('category')->where(['is_del'=>1])->paginate(2);
        return view('cate.catelist',['data'=>$res]);
    }
    public function deldo(){
        $id = \request()->id;
        $res = DB::table('category')->where(['id'=>$id])->update(['is_del'=>2]);
        if($res){
            return $this->ajaxData(000005,'成功');
        }else{
            return $this->ajaxData(000004,'失败');
        }
    }
    public function cateup(){
        $id = \request()->sort_id;
        $res = DB::table('category')->where(['id'=>$id])->first();
        return view('cate/docateup',['sortInfo'=>$res]);
    }
    public function docateup(){
        $arr = \request() -> all();
        $id = $arr['id'];
        $data = [
            'cate_name'     => $arr['sort'],
            'hidden'        => $arr['checkedx'],
            'createtime'    => time()
        ];
        $res = DB::table('category')->where(['id'=>$id])->update($data);
        if($res){
            return $this->ajaxData(000005,'成功');
        }else{
            return $this->ajaxData(000004,'失败');
        }
    }
    public function ajaxData($status=1,$msg='fali',$data=[]){
        return[
            'code' => $status,
            'massage' => $msg,
            'result' => $data
        ];
    }
}
