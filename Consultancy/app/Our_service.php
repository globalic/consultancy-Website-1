<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Our_service extends Model
{
    protected $table = 'our_services';
    protected $fillable = ['image','icon','title','short_description','description'];
}
