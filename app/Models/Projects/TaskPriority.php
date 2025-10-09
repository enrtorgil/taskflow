<?php
namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskPriority extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'task_priorities';

    protected $fillable = [
        'name',
        'color',
    ];

    protected $casts = [
        'name'  => 'string',
        'color' => 'string',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class, 'task_priority_id');
    }
}
