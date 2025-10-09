<?php
namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskState extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'task_states';

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
        return $this->hasMany(Task::class, 'task_state_id');
    }
}
