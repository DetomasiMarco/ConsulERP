<?php

declare(strict_types=1);

namespace App\Filament\Resources\Praticas;

use App\Filament\Resources\Praticas\Pages\CreatePratica;
use App\Filament\Resources\Praticas\Pages\EditPratica;
use App\Filament\Resources\Praticas\Pages\ListPraticas;
use App\Filament\Resources\Praticas\Schemas\PraticaForm;
use App\Filament\Resources\Praticas\Tables\PraticasTable;
use App\Models\Pratica;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

final class PraticaResource extends Resource
{
    protected static ?string $model = Pratica::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    // Add these methods for localization
    public static function getNavigationLabel(): string
    {
        return __('Pratiche');
    }

    public static function getPluralModelLabel(): string
    {
        return __('Pratiche');
    }

    public static function getModelLabel(): string
    {
        return __('Pratica');
    }

    public static function form(Schema $schema): Schema
    {
        return PraticaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return PraticasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListPraticas::route('/'),
            'create' => CreatePratica::route('/create'),
            'edit' => EditPratica::route('/{record}/edit'),
        ];
    }
}
