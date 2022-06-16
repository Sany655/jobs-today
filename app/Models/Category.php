<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function companies()
    {
        return $this->hasMany('App\Models\Company', 'category_id', 'id');
    }
}
