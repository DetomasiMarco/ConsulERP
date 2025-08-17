<?php

declare(strict_types=1);

namespace App\Filament\Resources\WorkflowTypes;

use App\Filament\Resources\WorkflowTypes\Pages\CreateWorkflowType;
use App\Filament\Resources\WorkflowTypes\Pages\EditWorkflowType;
use App\Filament\Resources\WorkflowTypes\Pages\ListWorkflowTypes;
use App\Filament\Resources\WorkflowTypes\Schemas\WorkflowTypeForm;
use App\Filament\Resources\WorkflowTypes\Tables\WorkflowTypesTable;
use App\Models\WorkflowType;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

use App\Filament\Resources\WorkflowTypes\WorkflowTypeResource\RelationManagers\WorkflowStepsRelationManager;

final class WorkflowTypeResource extends Resource
{
    protected static ?string $model = WorkflowType::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    // Add these methods for localization
    public static function getNavigationLabel(): string
    {
        return __('Tipi Workflow');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Tipi Workflow');
    }

    public static function getModelLabel(): string
    {
        return __('Tipo Workflow');
    }

    public static function form(Schema $schema): Schema
    {
        return WorkflowTypeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WorkflowTypesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            WorkflowStepsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWorkflowTypes::route('/'),
            'create' => CreateWorkflowType::route('/create'),
            'edit' => EditWorkflowType::route('/{record}/edit'),
        ];
    }
}
