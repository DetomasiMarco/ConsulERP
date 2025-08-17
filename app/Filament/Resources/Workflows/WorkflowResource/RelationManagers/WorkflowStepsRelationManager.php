<?php

declare(strict_types=1);

namespace App\Filament\Resources\Workflows\WorkflowResource\RelationManagers;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Schemas\Schema;

final class WorkflowStepsRelationManager extends RelationManager
{
    protected static string $relationship = 'workflowSteps';

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->nullable()
                    ->maxLength(65535),
                TextInput::make('order')
                    ->numeric()
                    ->default(0)
                    ->required(),
                Select::make('team_id')
                    ->label(__('Team Assegnato'))
                    ->relationship('team', 'name')
                    ->searchable()
                    ->preload()
                    ->nullable(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('order'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                //
            ]);
    }
}
