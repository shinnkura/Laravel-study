<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RequestSampleController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/hello-world', fn () => view("hello_world"));
Route::get('/hello', fn () => view("hello", ["name" => "俺", "age" => "20"]));

Route::get('/', fn () => view("index"));
Route::get('/curriculum', fn () => view("curriculum"));

// 世界の時間
Route::get('/world-time', [UtilityController::class, 'worldTime']);

// おみくじ
Route::get('/omikuji', [GameController::class, 'omikuji']);

// モンティ・ホール問題
Route::get('/monty-hall', [GameController::class, 'montyHall']);

// クエリパラメータ
Route::get('/form', [RequestSampleController::class, 'form']);
Route::get('/query-strings', [RequestSampleController::class, 'queryStrings']);

// ルートパラメータ
// クエリパラメーターではなく、
// URLのパスの一部を、送信データとみなす機能
// Route::get('/users/{id}', [RequestSampleController::class, 'profile']);
// 一つのURLに複数のパラメータを設定する
Route::get('/products/{category}/{year}', [RequestSampleController::class, 'productsArchive']);

// 名前付きルート
Route::get('/users/{id}', [RequestSampleController::class, 'profile'])->name('profile');
Route::get('/route-link', [RequestSampleController::class, 'routeLink']);