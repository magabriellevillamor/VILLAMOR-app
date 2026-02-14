<?php

use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;


Route::get('/', function () {
    return "Hello, World!";
});

Route::get('/show-user', [UserController::class, 'show']);

//Service Container
Route::get('/test-container', function (Request $request) {
    $input = $request->input('key');
    return $input;
});

//Service Provider
Route::get('test-service', function(UserService $userService):mixed {
    return $userService->listUsers();
});

//Service Provider
Route::get('/test-users', [UserController::class, 'index']);

//Facade
Route::get('test-facade', function(UserService $userService) {
    return Response::json($userService->listUsers());
});
