<?php

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

Route::get('/hello', function () {
    return "Hello World";
});

Route::redirect('/world', '/hello');

Route::fallback(function () {
    return "Ups, sepertinya terjadi kesalahan. Silahkan hubungi Developer.";
});

Route::get('/helloworld', function () {
    return view('hello', [
        'name' => 'jonathan'
    ]);
});

Route::get('/hello-world', function () {
    return view('hello.world', [
        'name' => 'jon'
    ]);
});
