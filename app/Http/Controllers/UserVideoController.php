<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/29 0029
 * Time: 下午 13:05
 */

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Request;
use Qiniu\Auth;

class UserVideoController
{
    public function index(Request $request)
    {
        $qiniuToken = new Auth();
    }
}