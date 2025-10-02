<?php 

use lib\Route;
use app\controller\IndexController;

Route::get("/", [IndexController::class,"Index"]);
Route::post("/", [IndexController::class,"Validar"]);
Route::post("/calculo", [IndexController::class,"Calculo"]);
Route::dispatch();

?>