<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//Rotas da Home
Route::controller(HomeController::class)->prefix("")->group(function(){
    Route::get("", "index")->name("home");
});

//Rotas Produto
Route::controller(ProductController::class)->prefix("produto")->group(function(){
    Route::get("", "index")->name("produto");
    Route::get("registro", "register")->name("produto.registro");
    Route::post("","create")->name("produto.criar");
    Route::get("editar/{product}",'edit')->name("produto.editar");
    Route::put("{product}","save")->name("produto.salvar");
    Route::get("delete/{product}", "delete")->name("produto.deletar");

});

