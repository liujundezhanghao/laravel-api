<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdentityRequest;
use App\Repositories\IdentityRepository;
use Illuminate\Http\Request;

class IdentityController extends Controller
{
    protected $repo;

    public function __construct(IdentityRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * 添加身份证
     *
     * @param CreateIdentityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateIdentityRequest $request)
    {
        $res = $this->repo->create($request);

        return $this->jsonReturn($res);
    }
}
