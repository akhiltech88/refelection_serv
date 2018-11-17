<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MemmorialAccount extends Model
{
    use SoftDeletes;
    public function gallery(){
    	return $this->hasMany('App\MemmorialGallery','package_id','package_id');
    }
    public function education(){
    	return $this->hasMany('App\MemmorialEducation','package_id','package_id');
    }
    public function family(){
    	return $this->hasMany('App\MemmorialFamily','package_id','package_id');
    }
    public function tribute(){
    	return $this->hasMany('App\MemmorialTribute','package_id','package_id');
    }
    public function position(){
    	return $this->hasMany('App\MemmorialPosition','package_id','package_id');
    }
}
