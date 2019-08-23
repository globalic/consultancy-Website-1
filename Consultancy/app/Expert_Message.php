<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expert_Message extends Model
{
    protected $table = 'expert_messages';
    protected $fillable = ['title','message','expert_id','status','rank'];

    public function expert(){
        return $this->belongsTo('App\OurExperts','expert_id');
    }
}
