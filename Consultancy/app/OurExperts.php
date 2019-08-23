<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OurExperts extends Model
{
    protected $table = 'our_experts';
    protected $fillable =['name','photo','position','rank','message','status'];

    public function expert_message(){
        return $this->hasMany('App\Expertmessages','expert_id');
    }
    
}
