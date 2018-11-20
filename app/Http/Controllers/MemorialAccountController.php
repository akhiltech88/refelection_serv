<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MemorialAccount;
use App\MemorialEducation;
use App\MemorialFamily;
use App\MemorialGallery;
use App\MemorialPackage;
use App\MemorialPosition;
use App\MemorialTribute;
use Auth;
use Validator;
use Response;

class MemorialAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mem_account = MemorialAccount::with('gallery')->with('education')->with('family')->with('position')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'music_id' => 'required|integer',
            'first_name' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'passed_date' => 'required|date',
            'relation_id' => 'required',
            'passed_country'=> 'required|integer',
            'birth_country'=> 'required|integer'
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }else{
            if ($request->hasFile('file')) {
                        $name = "photo_g".time();
                        $extension1 = $request->file->extension();
                        $request->file('file')->move(public_path().'/gallery',$name.".".$extension1);
                        $source = "gallery/".$name.".".$extension1;
                        $info = getimagesize($source);
                        if ($info['mime'] == 'image/jpeg'){
                            $image = imagecreatefromjpeg($source);
                        }elseif ($info['mime'] == 'image/gif'){ 
                            $image = imagecreatefromgif($source);
                        }elseif ($info['mime'] == 'image/png'){ 
                            $image = imagecreatefrompng($source);
                        }
                        imagejpeg($image, "gallery/".$name.".".$extension1, 60);

                        $media_url = "gallery/".$name.".".$extension1;
                    }            
            if(!$request->domain){
                $name = $request->first_name.$request->middle_name.$request->last_name;
                $domain_check = MemorialAccount::whereDomain($name)->first();
                if($domain_check){
                    $request->domain  = $request->first_name.substr(str_shuffle($request->middle_name.$request->last_name),0,7);
                }else{
                    $request->domain  = $name;
                }
            }
        }
        $mem_account = new MemorialAccount();
        //$mem_account->theme_id = $request->theme_id;
        $mem_account->theme_id = 1;
        $mem_account->music_id = $request->music_id;
        $mem_account->first_name = $request->first_name;
        $mem_account->middle_name = $request->middle_name;
        $mem_account->last_name = $request->last_name;
        $mem_account->gender = $request->gender;
        $mem_account->photo = $media_url;
        $mem_account->passed_date = date("Y-m-d",strtotime($request->passed_date));
        $mem_account->dob = date("Y-m-d",strtotime($request->dob));
        $mem_account->relation_id = $request->relation_id;
        $mem_account->birth_country = $request->birth_country;
        $mem_account->birth_city = $request->birth_city;
        $mem_account->passed_country = $request->passed_country;
        $mem_account->passed_city = $request->passed_city;
        $mem_account->domain = $request->domain;
        $mem_account->personal_phrase = $request->personal_phrase;
        $mem_account->hobbies = $request->hobbies;
       // $mem_account->users_id = Auth::user()->id;
        $mem_account->users_id = 1;
        $mem_account->status = 0;
        if($mem_account->save()){
            if($request->has('relations_name')&&$request->has('relations_id')){
                $i = 0;
                foreach ($request->relations_name as $relations_name) {
                    $mem_family = new MemorialFamily();
                    $mem_family->memorial_id = $mem_account->id;
                    $mem_family->relations_id = $request->relations_id[$i];
                    $mem_family->name = $relations_name;
                    $mem_family->type = 0;
                   // $mem_family->users_id = Auth::user()->id;
                    $mem_family->users_id = 1;
                    $mem_family->save();
                    $i++;
                }
            }
            if($request->has('course_name')&&$request->has('course_id')){
                $i = 0;
                foreach ($request->course_name as $course_name) {
                    $mem_education = new MemorialEducation();
                    $mem_education->course_id = $request->course_id[$i];
                    $mem_education->memorial_id = $mem_account->id;
                    $mem_education->stream = $course_name;
                    /*$mem_education->start_at = $education->start_at;
                    $mem_education->end_at = $education->end_at;*/
                  //  $mem_education->users_id = Auth::user()->id;
                    $mem_education->users_id = 1;
                    $mem_education->save();
                    $i++;
                }
            }
            if($request->has('organisation')&&$request->has('positions_id')){
                $i = 0;
                foreach ($request->organisation as $organisation) {
                    $mem_positions = new MemorialPosition();
                    $mem_positions->positions_id = $request->positions_id[$i];
                    $mem_positions->memorial_id = $mem_account->id;
                    $mem_positions->organisation = $organisation;
                   // $mem_positions->descriptions = $request->descriptions;
                    //$mem_positions->users_id = Auth::user()->id;
                    $mem_positions->users_id = 1;
                    $mem_positions->save();
                    $i++;
                }
            }
            $mem_package = new MemorialPackage();
            $mem_package->memorial_id = $mem_account->id;
            $mem_package->package_id = $request->package_id;
            $mem_package->status = 0;
            $mem_package->save();
            $response = array(
                'success' => 'true',
                'code' => 200,
                'data' => $request->package_id,
                'memorial_id' => $mem_account->id
            );
            return response($response, 200);
        }else{

        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mem_account = MemorialAccount::find($id);
        $mem_account = $mem_account->with('gallery')->with('education')->with('family')->with('position')->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
