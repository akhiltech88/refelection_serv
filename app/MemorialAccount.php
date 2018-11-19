<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemorialAccount extends Model
{
    use SoftDeletes;
    public function gallery(){
    	return $this->hasMany('App\MemorialGallery','package_id','package_id');
    }
    public function education(){
    	return $this->hasMany('App\MemorialEducation','package_id','package_id');
    }
    public function family(){
    	return $this->hasMany('App\MemorialFamily','package_id','package_id');
    }
    public function tribute(){
    	return $this->hasMany('App\MemorialTribute','package_id','package_id');
    }
    public function position(){
    	return $this->hasMany('App\MemorialPosition','package_id','package_id');
    }
}
