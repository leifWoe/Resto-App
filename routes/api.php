<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Controllers\Api\ApiCategoryController;

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/


#show all
Route::get('/categories/get', [ApiCategoryController::class, 'index']);

#post one 
Route::post('/category/store', [ApiCategoryController::class, 'store']);

#show one {id}
Route::get('/category/{id}/show', [ApiCategoryController::class, 'show']);

Route::put('/category/{id}/update', [ApiCategoryController::class, 'update']);

Route::delete('/category/{id}/delete', [ApiCategoryController::class, 'destroy']);


