<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $table = '_about_us';
    protected $fillable = ['image','title',"description"];
}
