<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RequestSampleController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hello-world', fn() => view("hello_world"));
Route::get('/hello', fn() => view("hello", ["name" => "俺", "age" => "20"]));

Route::get('/', fn() => view("index"));
Route::get('/curriculum', fn() => view("curriculum"));

// 世界の時間
Route::get('/world-time', [UtilityController::class, 'worldTime']);

// おみくじ
Route::get('/omikuji', [GameController::class, 'omikuji']);

// モンティ・ホール問題
Route::get('/monty-hall', [GameController::class, 'montyHall']);

Route::get('/form', [RequestSampleController::class, 'form']);
Route::get('/query-strings', [RequestSampleController::class, 'queryStrings']);