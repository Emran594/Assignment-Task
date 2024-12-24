<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string, string>
     */
    protected $fillable = [
        'name',
        'project_id',
        'description',
        'status',
        'teammate_id',
    ];

    /**
     * Define relationship with project.
     */
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }

    /**
     * Define relationship with teammate (User).
     */
    public function teammate()
    {
        return $this->belongsTo(User::class, 'teammate_id');
    }
}
