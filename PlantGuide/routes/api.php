<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\ContainerObject;
use App\Models\Plant;


Route::get('/containers', function () {
    return ContainerObject::with(['plant', 'varieties.notes'])->get();
});

Route::get('/plants', function () {
    return Plant::with(['varieties', 'notes'])->get();
});
