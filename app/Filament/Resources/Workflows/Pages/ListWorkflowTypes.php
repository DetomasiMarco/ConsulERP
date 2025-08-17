<?php

declare(strict_types=1);

namespace App\Filament\Resources\WorkflowTypes\Pages;

use App\Filament\Resources\WorkflowTypes\WorkflowTypeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

final class ListWorkflowTypes extends ListRecords
{
    protected static string $resource = WorkflowTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
