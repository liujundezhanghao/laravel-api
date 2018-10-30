<?php

namespace App\Repositories;

use App\User;
use Image;

class UserRepository
{

    /**
     * 修改昵称图片
     *
     * @param $request
     * @return mixed
     */
    public function update($request)
    {
        $user = $request->user();

        if($request->nickname) {
            $user->nickname = $request->nickname;
        }

        if($request->user_img) {
            $user->user_img = $request->user_img;
        }

        return $user->save();
    }



}