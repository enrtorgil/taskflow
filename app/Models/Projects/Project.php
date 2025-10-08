<?php
namespace App\Models\Projects;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'responsible_id',
        'name',
        'date_start',
        'date_end',
        'status',
    ];

    protected $casts = [
        'date_start' => 'date',
        'date_end'   => 'date',
        'status'     => 'boolean',
    ];

    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }
}
