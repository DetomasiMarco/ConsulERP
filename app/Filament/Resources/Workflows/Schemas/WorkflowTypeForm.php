<?php

declare(strict_types=1);

namespace App\Filament\Resources\WorkflowTypes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

final class WorkflowTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->label(__('Nome'))
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label(__('Descrizione'))
                    ->nullable()
                    ->maxLength(65535),
            ]);
    }
}
