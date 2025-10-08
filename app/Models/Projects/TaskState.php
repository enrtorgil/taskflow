<?php
namespace App\Models\Projects;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskState extends Model
{
    use HasFactory;

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
