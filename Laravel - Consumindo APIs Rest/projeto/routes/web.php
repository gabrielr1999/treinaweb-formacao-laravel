<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\GithubController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/github/buscar', [GithubController::class, 'buscar']);
Route::get('/github/list', [GithubController::class, 'list']);
Route::get('/github/show', [GithubController::class, 'show']);
Route::get('/curso/create', [CursoController::class, 'create']);
Route::get('/curso/update', [CursoController::class, 'update']);
Route::get('/curso/delete', [CursoController::class, 'delete']);
