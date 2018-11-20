<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Relation;
use App\Theme;
use App\Music;
use App\Country;
use App\Position;
use App\Course;
use App\Package;
use App\MemorialAccount;
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
        $packages = Package::with('package_features')->get();
        return view('create-memorial')
            ->withThemes($themes)
            ->withMusics($musics)
            ->withCountries($country)
            ->withPositions($positions)
            ->withCourses($courses)
            ->withPackages($packages)
            ->withRelations($relations);
    }
    public function contact(Request $request)
    {
        
        return view('contact');
    }
    public function price(Request $request)
    {
        
        return view('price');
    }
    public function memorialWall(Request $request)
    {
        $mem_account = MemorialAccount::with('by_birth')->get();
        return view('memorial-wall')
            ->withMemorials($mem_account);
    }
    public function memorialPage($id){
        $mem_account = MemorialAccount::with('theme')->with('by_birth')->with('photos')->with('audio')->with('video')->with('education.mem_course')->with('family.mem_relation')->with('position')->find($id);
        //$mem_account = $mem_account->with('by_birth')->with('gallery')->with('education.mem_course')->with('family.mem_relation')->with('position')->first();
        return view('memorial-page')
            ->withMemorial($mem_account);
    }
    public function aboutUs(Request $request)
    {
        
        return view('about-us');
    }
    public function saveMemorial(Request $request)
    {
    	return "Success";
    }
}
