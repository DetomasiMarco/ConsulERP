<?php

declare(strict_types=1);

arch()->preset()->php();
arch()->preset()->security();

// Custom Laravel preset to exclude AdminPanelProvider from ServiceProvider suffix check
arch('Laravel')
    ->expect('App\\Providers')
    ->toExtend(\Illuminate\Support\ServiceProvider::class)
    ->toHaveSuffix('ServiceProvider')
    ->ignoring('App\\Providers\\Filament\\AdminPanelProvider');

arch('controllers')
    ->expect('App\Http\Controllers')
    ->not->toBeUsed();

//
