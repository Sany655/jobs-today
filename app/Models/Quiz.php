<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function job()
    {
        return $this->belongsTo('App\Models\Job','job_id','id');
    }
    public $timestamp = true;
}
