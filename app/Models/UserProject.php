<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;

class UserProject extends Model
{
    public function user()
    {
    	return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function project()
    {
    	return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
