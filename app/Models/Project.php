<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'project_code',
        'name',
        'manager_id',
    ];

    /**
     * Define relationship with manager (User).
     */
    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * Define relationship with tasks.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'project_id');
    }
}
