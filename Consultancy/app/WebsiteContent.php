<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebsiteContent extends Model
{
    protected $table = 'website_contents';
    protected $fillable = ['company_address','email',"phone","logo","facebook","instagram","youtube","google","map"];
}
