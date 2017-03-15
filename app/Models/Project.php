<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;

class Project extends Model
{
    protected $fillable = [
        'name', 'description', 'teacher_id',
    ];

    public function user()
    {
    	return $this->belongsTo(User::class, 'teacher_id', 'id');
    }

    public function userProjects()
    {
    	return $this->hasMany(UserProject::class, 'id', 'project_id');
    }
}
