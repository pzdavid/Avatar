<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Mail extends Model{

    public $timestamps = false;

    public function users(){
        return $this->belongsTo(User::class);
    }
}
