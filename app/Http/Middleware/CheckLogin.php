<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user_id = session('id');
        if (empty($user_id)) {
            return redirect('/login');
        }
        $url = $request->path();
//        var_dump($url);exit;
        $where = [
            ['zhuce.id', '=', $user_id],
        ];
        $data = DB::table('zhuce')
            ->leftJoin('userrole', 'userrole.uid', '=', 'zhuce.id')
            ->leftJoin('role', 'role.r_id', '=', 'userrole.rid')
            ->leftJoin('privlist', 'privlist.rid', '=', 'role.r_id')
            ->leftJoin('priv', 'priv.id', '=', 'privlist.pid')
            ->where($where)
            ->get();
        foreach ($data as $k => $v) {
//            print_r($v);die;
            if ($v->name !== '度国伟') {
                echo "<script>alert('没有权限访问');window.history.go(-1);</script>";
            }
        }
        return $next($request);
    }
}
