<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilityController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\RequestSampleController;
use App\Http\Controllers\EventController;

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

// フォーム送信
Route::get('login', [RequestSampleController::class, 'loginForm']);
Route::post('login', [RequestSampleController::class, 'login'])->name('login');

// リソースコントローラとリソースルート
// Route::resource('events', EventController::class)->only('index', 'create','store');

// リダイレクト
Route::resource('events', EventController::class)->only('create', 'store');
