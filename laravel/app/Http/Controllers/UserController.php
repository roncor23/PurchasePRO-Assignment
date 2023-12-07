<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function store(UserRequest $request)
    {
        return new UserResource($request->saveData());
    }
}
