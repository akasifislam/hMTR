<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tasks()
    {
        return $this->hasManyThrough(
            Task::class,
            Team::class,
            'project_id', // forign key in user table
            'user_id',      // forign key in task table
            'id',           // local table in project table
            'user_id',
        );
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
