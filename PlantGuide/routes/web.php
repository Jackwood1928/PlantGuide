<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\PlanterBox;
use App\Models\Plant;

Route::get('/', function () {
    return view('welcome');
});

