<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\ApiController;


// Route Group...tutte le Route qui dentro faranno capo a questo indirizzo...


// Nel Browser ci va api/v1/URLdellarotta

Route :: group(['prefix' => '/v1'], function() {

    Route::get('test', [ApiController::class, 'getTest'])->name('api.test');

    Route::get('users', [ApiController::class, 'getUsers'])->name('api.users');

    Route::get('events', [ApiController::class, 'getEvents'])->name('api.events');

    Route::get('tags', [ApiController::class, 'getTags'])->name('api.tags');

} );







