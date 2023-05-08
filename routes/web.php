<?php

use App\Models\Space;
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

Route::get('/', function () {
    $spaces = Space::whereHas('images')->with('images')->get();
    return inertia('Index', ['spaces' => $spaces]);
});
