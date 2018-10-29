<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * json 返回方法
     *
     * @param $data
     * @param int $count
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     *
     */
    protected function jsonReturn($data, $count = 0, $message = "success")
    {
        $request = request();
        if ($count === 0) {
            $result = [
                'code'    => 200,
                'message' => $message,
                'data'    => $data
            ];
        } else {
            $result = [
                'code'    => 200,
                'message' => $message,
                'data'    => $data,
                'page'    => [
                    'page'  => $request->page ?? 1,
                    'per'   => $request->per ?? 10,
                    'count' => (int)$count,
                ]
            ];
        }

        return response()->json($result);
    }
}
