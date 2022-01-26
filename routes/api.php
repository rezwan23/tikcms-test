<?php

use App\Http\Controllers\HomeController;
use App\Models\Template;
use Illuminate\Support\Facades\Response;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/save-template', [HomeController::class, 'saveTemplate']);

Route::get('/get-templates', [HomeController::class, 'getTemplates']);


Route::get('/get-css/{template}', function(Template $template) {
    // fetch your CSS and assign to $contents
    $contents = $template->style;
    $response = Response::make($contents);
    $response->header('Content-Type', 'text/css');
    return $response;
});

Route::post('save-images', [HomeController::class, 'saveImages']);

Route::get('get-images', [HomeController::class, 'getImages']);