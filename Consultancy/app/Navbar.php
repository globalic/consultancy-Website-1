<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    protected $table = 'navbar_status';
    protected $fillable = ['about_us','services','abroad_study'];
}
