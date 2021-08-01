<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Service extends Model
{
    protected $table = "services";


    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
