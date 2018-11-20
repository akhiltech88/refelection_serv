<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemorialAccount extends Model
{
    use SoftDeletes;
    public function photos(){
    	return $this->hasMany('App\MemorialGallery','memorial_id','id')->whereType(1);
    }
    public function theme(){
        return $this->hasOne('App\Theme','id','theme_id');
    }
    public function audio(){
        return $this->hasMany('App\MemorialGallery','memorial_id','id')->whereType(0);
    }
    public function video(){
        return $this->hasMany('App\MemorialGallery','memorial_id','id')->whereType(2);
    }
    public function education(){
    	return $this->hasMany('App\MemorialEducation','memorial_id','id');
    }
    public function family(){
    	return $this->hasMany('App\MemorialFamily','memorial_id','id');
    }
    public function tribute(){
    	return $this->hasMany('App\MemorialTribute','memorial_id','id');
    }
    public function position(){
    	return $this->hasMany('App\MemorialPosition','memorial_id','id');
    }
    public function by_birth(){
        return $this->hasOne('App\Country','id','birth_country');
    }
}
