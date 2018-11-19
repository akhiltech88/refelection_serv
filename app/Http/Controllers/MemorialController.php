<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relation;
use App\Theme;
use App\Music;
use App\Country;
use App\Position;
use App\Course;
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
        $positions = Position::all();
        $courses = Course::all();
        return view('create-memorial')
            ->withThemes($themes)
            ->withMusics($musics)
            ->withCountries($country)
            ->withPositions($positions)
            ->withCourses($courses)
            ->withRelations($relations);
    }
    public function saveMemorial(Request $request)
    {
    	return "Success";
    }
}
