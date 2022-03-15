<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $guarded = [];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function userNews(){
        return $this->belongsTo(User::class,'user_id');
    }

}
