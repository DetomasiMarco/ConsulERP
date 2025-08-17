<?php

declare(strict_types=1);

namespace App\Filament\Resources\WorkflowTypes\Pages;

use App\Filament\Resources\WorkflowTypes\WorkflowTypeResource;
use Filament\Resources\Pages\CreateRecord;

final class CreateWorkflowType extends CreateRecord
{
    protected static string $resource = WorkflowTypeResource::class;
}
