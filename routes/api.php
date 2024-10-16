<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RecoverPasswordCodeController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthUserController;

// Crud de Usuários
Route::get('/users', [UserController::class, 'index']); //GET - http:127.0.0.1/api/users    
Route::get('/users/{user}', [UserController::class, 'show']); // GET - http:127.0.0.1
Route::post('/users', [UserController::class, 'store']); // POST - http:127.0.0.1/api/users
Route::put('/users/{user}', [UserController::class, 'update']); // PUT - http:127.0.0.1/api/users/1
Route::delete('/users/{user}', [UserController::class, 'destroy']); // DELETE - http:127.0.0.1/api/users/1


// Rota pública
Route::post('/', [LoginController::class, 'login'])->name('login'); // POST - http://127.0.0.1:8000/api/

//Rota restv  rita
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/auth-users', [AuthUserController::class, 'index']); // GET - http://127.0.0.1:8000/api/auth-users/
    Route::post('/logout/{user}', [LoginController::class, 'logout']); // POST - http://127.0.0.1:8000/api/logout/1
});

// Recuperar a senha
Route::post("/forgot-password-code", [RecoverPasswordCodeController::class, 'forgotPasswordCode']);
Route::post("/reset-password-validate-code", [RecoverPasswordCodeController::class, 'resetPasswordValidateCode']);
Route::post("/reset-password-code", [RecoverPasswordCodeController::class, 'resetPasswordCode']);

