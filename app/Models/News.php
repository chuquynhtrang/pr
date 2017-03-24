<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FileNew;

class News extends Model
{
    protected $table = "news";
    protected $fillable = ['title', 'body', 'user_id'];

    public function filenews()
    {
    	return $this->hasMany(FileNew::class);
    }
}
