<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relation;
use App\Theme;
use App\Music;
use App\Country;
use Auth;
use Validator;
use Response;

class MemorialController extends Controller
{
    public function createMemorial(Request $request)
    {
    	$themes = Theme::all();
        $musics = Music::all();
        $country = Country::all();
        $relations = Relation::all();
        return view('create-memorial')
            ->withThemes($themes)
            ->withMusics($musics)
            ->withCountries($country)
            ->withRelations($relations);
    }
    public function saveMemorial(Request $request)
    {
    	return "Success";
    }
}
