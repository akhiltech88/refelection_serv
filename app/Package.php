<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Package extends Model
{
	use SoftDeletes;
    public function package_features(){
    	return $this->hasOne('App\PackageFeature','package_id','id');
    }
}
