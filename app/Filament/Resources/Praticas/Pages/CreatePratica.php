<?php

declare(strict_types=1);

namespace App\Filament\Resources\Praticas\Pages;

use App\Filament\Resources\Praticas\PraticaResource;
use Filament\Resources\Pages\CreateRecord;

final class CreatePratica extends CreateRecord
{
    protected static string $resource = PraticaResource::class;
}
