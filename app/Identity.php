<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    protected $table = 'identity_card';

    protected $fillable = [
        'real_name',
        'id_card',
        'mobile',
    ];
}
