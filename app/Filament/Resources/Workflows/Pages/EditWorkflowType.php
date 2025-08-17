<?php

declare(strict_types=1);

namespace App\Filament\Resources\WorkflowTypes\Pages;

use App\Filament\Resources\WorkflowTypes\WorkflowTypeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

final class EditWorkflowType extends EditRecord
{
    protected static string $resource = WorkflowTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
