<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $fillable = ['title'];
    public int $parent_id = 0;

    public function news()
    {
        return $this->belongsToMany(News::class);
    }
}
