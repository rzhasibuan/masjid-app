<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $guarded = [];

    public static function information() {
        return self::all()->first();
    }


}
