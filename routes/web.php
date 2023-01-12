<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
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

function fib(int $number): int
{
    if ($number <= 1) {
        return $number;
    }

    return fib($number - 1) + fib($number - 2);
}


Route::get('/', function () {
$startTime = microtime(true);
echo fib(40).PHP_EOL;
$endTime = microtime(true);

echo sprintf('%.2f sec', $endTime - $startTime);       
  //return view('welcome');

});

//Route::get('/',[IndexController::class, 'index']);
