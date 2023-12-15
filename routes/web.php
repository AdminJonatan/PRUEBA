<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CrudController;



//Route::get('/', function () {
  // return view('home');
//})->middleware('auth');

Route::get('/',[CrudController::class,'index'])->name('crud.index')->middleware('auth');


Route::get('/register',[RegisterController::class,'create'])
->middleware('guest')
->name('register.index');


Route::post('/register',[RegisterController::class,'store'])
->name('register.store');


Route::get('/login',[SessionController::class,'create'])
->middleware('guest')
->name('login.index');


Route::post('/login',[SessionController::class,'store'])
->name('login.store');

Route::get('/logout',[SessionController::class,'destroy'])
->middleware('auth')
->name('login.destroy');




// ruta para listar la tabla
//Route::get('/',[CrudController::class,'index'])->name('crud.index');



// ruta para añidr tittulo
Route::post('/crear-titulo',[CrudController::class,'create'])
//->middleware('auth')
->name('crud.create');


// ruta para modificar titulo
Route::post('/modificar-titulo',[CrudController::class,'update'])
//->middleware('auth')
->name('crud.update');


// ruta para ELIMINAR titulo
Route::get('/Eliminar-titulo-{id}',[CrudController::class,'delete'])
//->middleware('auth')
->name('crud.delete');




