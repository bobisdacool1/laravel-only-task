<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function show(int $userId)
    {
        return new UserResource (User::with(['role'])->find($userId));
    }
}
