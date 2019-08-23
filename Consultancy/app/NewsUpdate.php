<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsUpdate extends Model
{
    protected $table = 'news_updates';
    protected $fillable = ['image','author_image','author_name','short_description','description'];
}
