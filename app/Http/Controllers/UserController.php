<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Illuminate\Http\Response;

class UserController extends Controller 
{

    public function show(): Response {
        $users = [
            [
                'name' => 'John Doe',
                'gender' => 'Male'
            ],
            [
                'name' => 'Jane Smith',
                'gender' => 'Female'
            ]
        ];
        return response($users);
    }

    public function index(UserService $userService): mixed {
        return $userService->listUsers();
    }
}
