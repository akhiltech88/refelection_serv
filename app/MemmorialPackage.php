<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MemmorialPackage extends Model
{
    use SoftDeletes;
    public function package(){
    	return $this->hasOne('App\PackageFeature','package_id','package_id');
    }
}
