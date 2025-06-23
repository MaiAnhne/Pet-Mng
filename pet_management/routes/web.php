<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PetController;

Route::middleware(['auth'])->group(function() {
    Route::resource('owners', OwnerController::class);
    Route::resource('pets', PetController::class);
    Route::get('owner/{owner}/pets', [OwnerController::class, 'showPets'])->name('owner.pets');
    Route::post('owner/{owner}/assign-pet/{pet}', [OwnerController::class, 'assignPet'])->name('owner.assign_pet');
    Route::get('stats/top-pets', [PetController::class, 'topPets'])->name('stats.top_pets');
});
