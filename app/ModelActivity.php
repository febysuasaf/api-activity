<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelActivity extends Model
{
   protected $table = 'ACTIVITY'; //nama table yang kita buat lewat migration adalah todo
   // public $timestamps = false;

    protected $fillable = [
        'user_id', 'activity', 'status',
    ];
}
