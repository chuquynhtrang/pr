<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\News;

class FileNew extends Model
{
    protected $fillable = ['name'];

    public function news()
    {
    	return $this->belongsTo(News::class);
    }
}
