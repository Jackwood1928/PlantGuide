<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\PlanterBox;
use App\Models\Plant;

Route::get('/planter-boxes', function () {
    return PlanterBox::with('plant')->orderBy('position')->get();
});

Route::get('/plants', function () {
    return Plant::with('varieties')->get();
});

Route::post('/planter-boxes/{box}', function (Request $request, PlanterBox $box) {
    $box->plant_id = $request->input('plant_id');
    $box->save();
    return $box->load('plant');
});
