<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;


Route::get('/',function(){
    return view('Homepage');
});
Route::get('/index',function(){
    return view('Register');
});

//controllers
Route::get('/homepage',[RegisterController::class,'home']);
//Route::get('/Registration/{name}',[RegisterController::class,'register'])->name('pltop');
Route::post('/registration',[RegisterController::class,'register']);
?>



