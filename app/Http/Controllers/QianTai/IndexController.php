<?php

namespace App\Http\Controllers\QianTai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view('qiantai.index');
    }
}
