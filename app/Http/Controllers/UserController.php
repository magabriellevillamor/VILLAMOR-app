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
        return view('users.index', ['users' => $userService->listUsers()]);
    }

    public function first(UserService $userService) {
        return collect($userService->listUsers())->first();
    }

    public function get(UserService $userService, $id) {
        $user = collect($userService->listUsers())->filter(function ($item) use ($id) {
            return $item['id'] == $id;
        })->first();

        return $user;
    }

}
