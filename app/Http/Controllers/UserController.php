<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdentityRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $repo;

    public function __construct()
    {

    }

    public function identity(CreateIdentityRequest $request)
    {

    }
}
