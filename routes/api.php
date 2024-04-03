<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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

Route::get('/google', function(){
    $token = "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";
    $response = Http::withHeaders([
        'Authorization' => 'Bearer'.$token,
        ])->post('https://analyticsdata.googleapis.com/v1beta/properties/381076257:runReport',[
        "dimensions"=>[
             "name"=> "country" 
            ],
        "metrics"=> [ "name"=> "activeUsers" ]
    ]);

    return $response->json();
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
