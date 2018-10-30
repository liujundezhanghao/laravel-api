<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdentityRequest;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Http\Requests\UpdateUserRequest;
use App\User;

class UserController extends Controller
{
    protected $repo;

    public function __construct(UserRepository $repo)
    {   
        $this->repo = $repo;
    }

    /**
     * 添加昵称图片
     * 
     */
    public function update(UpdateUserRequest $request)
    {
        $res = $this->repo->update($request);

        return $this->jsonReturn($res);
    }

    /**
     * 获取个人信息
     */
    public function show(Request $request)
    {
        $user = $request->user();

        return $this->jsonReturn($user);
    }
}
