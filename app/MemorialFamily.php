<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MemorialFamily extends Model
{
    use SoftDeletes;
    public function mem_relation(){
        return $this->hasOne('App\Relation','id','relations_id');
    }
}
