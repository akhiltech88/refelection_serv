<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MemorialEducation extends Model
{
    use SoftDeletes;
    public function mem_course(){
        return $this->hasOne('App\Course','id','course_id');
    }
}
