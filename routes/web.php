<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
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

Route::get('/products/{id}', function ($productId) {
    return "Product $productId";
})->name("product.detail");

Route::get('/products/{product}/items/{item}', function ($productId, $itemId) {
    return "Product $productId dan Item $itemId";
})->name("product.item.detail");

Route::get('/category/{id}', function ($categoryId) {
    return "Category $categoryId";
})->where('id', '[0-9]+')->name("category.detail");

Route::get('/users/{id?}', function ($userId = 'xz') {
    return "User id $userId";
})->name("user.detail");

Route::get('produk/{id}', function ($id) {
    $link = route('product.detail', ['id' => $id]);
    return "Link $link";
});

Route::get('/product-redirect/{id}', function ($id) {
    return redirect()->route('product.detail', ['id' => $id]);
});

Route::get('/controller/hello/request', [HelloController::class, 'request']);
Route::get('/controller/hello/{name}', [HelloController::class, 'hello']);
Route::get('/controller/hello2/{name}/{name2}', [HelloController::class, 'hello2']);

Route::get('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello', [InputController::class, 'hello']);
Route::post('/input/hello/first', [InputController::class, 'helloFirstName']);
Route::post('/input/hello/input', [InputController::class, 'helloInput']);
Route::post('/input/hello/array', [InputController::class, 'helloArray']);
Route::post('/input/type', [InputController::class, 'inputType']);
