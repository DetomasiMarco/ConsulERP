<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class WorkflowType extends Model
{
    /** @use HasFactory<\Database\Factories\WorkflowFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function workflowSteps(): HasMany
    {
        return $this->hasMany(WorkflowStep::class);
    }
}
