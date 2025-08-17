<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Pratica extends Model
{
    /** @use HasFactory<\Database\Factories\PraticaFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'client_id',
        'client_name',
        'workflow_id',
        'current_workflow_step_id',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function currentWorkflowStep(): BelongsTo
    {
        return $this->belongsTo(WorkflowStep::class, 'current_workflow_step_id');
    }
}
