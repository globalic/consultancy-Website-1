<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbroadStudy extends Model
{
    protected $table = 'abroad_study';
    protected $fillable = ['title','image','short_description','description'];
}
