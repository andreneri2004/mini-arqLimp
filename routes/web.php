<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    \App\Jobs\Book\ConvertBookJob::dispatch('188e831e-0335-4bc9-9deb-c4d6dba6b258');
   
    return view('welcome');
});
