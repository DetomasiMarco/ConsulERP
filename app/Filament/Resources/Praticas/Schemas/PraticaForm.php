<?php

declare(strict_types=1);

namespace App\Filament\Resources\Praticas\Schemas;

use App\Models\Workflow;
use App\Models\WorkflowStep;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Set;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Get;
use Illuminate\Support\Collection;

final class PraticaForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('title')
                    ->label(__('Titolo'))
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->label(__('Descrizione'))
                    ->nullable()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Select::make('client_id')
                    ->label(__('Cliente'))
                    ->relationship('client', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('workflow_id')
                    ->label(__('Workflow'))
                    ->relationship('workflow', 'name')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->afterStateUpdated(function (Set $set) {
                        $set('current_workflow_step_id', null);
                    })
                    ->required(),
                Select::make('current_workflow_step_id')
                    ->label(__('Step Corrente del Workflow'))
                    ->options(fn (Get $get): Collection => WorkflowStep::query()
                        ->where('workflow_id', $get('workflow_id'))
                        ->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->nullable()
                    ->visible(fn (Get $get): bool => (bool) $get('workflow_id')),
            ]);
    }
}
