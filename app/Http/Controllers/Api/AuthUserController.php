<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class AuthUserController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::get();

        return response()->json([
            'status' => true,
            'users' => $users,
        ], 200);
    }
}
