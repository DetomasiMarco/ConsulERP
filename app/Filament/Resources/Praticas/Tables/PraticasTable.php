<?php

declare(strict_types=1);

namespace App\Filament\Resources\Praticas\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class PraticasTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('Titolo'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('client.name')
                    ->label(__('Cliente'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('workflow.name')
                    ->label(__('Workflow'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('currentWorkflowStep.name')
                    ->label(__('Step Corrente'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('currentWorkflowStep.team.name')
                    ->label(__('Team Assegnato'))
                    ->searchable()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('Creato il'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label(__('Aggiornato il'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
