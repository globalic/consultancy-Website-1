<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class Client_review extends Model
{
    protected $table = 'client_reviews';
    protected $fillable = ['image','email','phone','location','user_name','description'];
}
