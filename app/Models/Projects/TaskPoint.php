<?php
namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskPoint extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'task_points';

    protected $fillable = [
        'task_id',
        'points',
    ];

    protected $casts = [
        'points' => 'integer',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id');
    }
}
