<?php

use App\Http\Controllers\{
    EmployeeController
};
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

Route::middleware('auth')->group(function (){
    Route::any('/funcionarios/search', [EmployeeController::class, 'search'])->name('employees.search');
    Route::put('/funcionarios/edit/{name}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::get('/funcionarios/edit/{name}', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::get('/funcionarios/add', [EmployeeController::class, 'create'])->name('employees.create');
    Route::delete('/funcionarios/{name}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    Route::get('/funcionarios/{name}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::post('/funcionarios/add', [EmployeeController::class, 'insert'])->name('employees.insert');
    Route::get('/funcionarios', [EmployeeController::class, 'index'])->name('employees.index');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';