<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class WorkflowStep extends Model
{
    /** @use HasFactory<\Database\Factories\WorkflowStepFactory> */
    use HasFactory;

    protected $fillable = [
        'workflow_id',
        'team_id',
        'name',
        'description',
        'order',
    ];

    public function workflow(): BelongsTo
    {
        return $this->belongsTo(Workflow::class);
    }

    public function team(): BelongsTo
    {
        return $this->belongsTo(Team::class);
    }
}
