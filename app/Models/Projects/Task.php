<?php
namespace App\Models\Projects;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tasks';

    protected $fillable = [
        'project_id',
        'parent_id',
        'task_state_id',
        'task_priority_id',
        'name',
        'description',
        'date_start',
        'date_end',
        'order',
        'remarks',
    ];

    protected $casts = [
        'date_start' => 'datetime',
        'date_end'   => 'datetime',
    ];

    protected static function booted()
    {
        static::restored(function ($task) {
            $task->subtasks()->withTrashed()->get()->each->restore();
            $task->comments()->withTrashed()->get()->each->restore();
            $task->points()->withTrashed()->get()->each->restore();
            $task->dependencies()->withTrashed()->get()->each->restore();
            $task->activities()->withTrashed()->get()->each->restore();
        });
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    public function parent()
    {
        return $this->belongsTo(Task::class, 'parent_id');
    }

    public function subtasks()
    {
        return $this->hasMany(Task::class, 'parent_id');
    }

    public function state()
    {
        return $this->belongsTo(TaskState::class, 'task_state_id');
    }

    public function priority()
    {
        return $this->belongsTo(TaskPriority::class, 'task_priority_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_user')->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(TaskComment::class)->latest();
    }

    public function activities()
    {
        return $this->hasMany(TaskActivity::class)->latest();
    }

    public function points()
    {
        return $this->hasOne(TaskPoint::class);
    }

    public function dependencies()
    {
        return $this->hasMany(TaskDependency::class);
    }
}
