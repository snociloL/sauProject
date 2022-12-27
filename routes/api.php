<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\AuthController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::resource('students', StudentController::class);

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => ['auth:api']], function() {
//     Route::get('/students/search/{name}', [StudentController::class, 'search']);
//     Route::post('/students', [StudentController::class, 'store']);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::put('/students/{id}', [StudentController::class, 'update']);
//     Route::delete('/students/{id}', [StudentController::class, 'destroy']);
// });

//Route::post('register', [RegisterController::class, 'register']);
//Route::post('login', [RegisterController::class, 'login']);
      
Route::middleware('auth:api')->group( function () {
    Route::get('students/search/{name}', [StudentController::class, 'search']);
    Route::post('students/store', [StudentController::class, 'store']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::put('students/update/{id}', [StudentController::class, 'update']);
    Route::delete('students/delete/{id}', [StudentController::class, 'destroy']);
    // Import
//     Route::post('students/bulk', ['uses' => 'BulkControllerRequest@bulkStore']);
//     Route::post('/import_parse', [\App\Http\Controllers\ImportController::class, 'parseImport'])->name('import_parse');
// Route::post('/import_process', [\App\Http\Controllers\ImportController::class, 'processImport'])->name('import_process');
});