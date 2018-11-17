<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MemmorialAccount;
use App\MemmorialEducation;
use App\MemmorialFamily;
use App\MemmorialGallery;
use App\MemmorialPackage;
use App\MemmorialPosition;
use App\MemmorialTribute;
use Auth;
use Validator;
use Response;

class MemmorialAccountController extends Controller
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
            'theme_id' => 'required|integer',
            'music_id' => 'required|integer',
            'first_name' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'passed_date' => 'required|date',
            'relation_id' => 'required',
            'domain' => 'unique:memorial_accounts',
            'passed_country'=> 'required|integer',
            'birth_country'=> 'required|integer',
            'personal_phrase'=> 'max:350',
            'terms'    => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }else{
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
        $mem_account = new MemmorialAccount();
        $mem_account->theme_id = $request->theme_id;
        $mem_account->music_id = $request->music_id;
        $mem_account->first_name = $request->first_name;
        $mem_account->middle_name = $request->middle_name;
        $mem_account->last_name = $request->last_name;
        $mem_account->gender = $request->gender;
        $mem_account->photo = $request->photo;
        $mem_account->passed_date = $request->passed_date;
        $mem_account->dob = $request->dob;
        $mem_account->relation_id = $request->relation_id;
        $mem_account->birth_country = $request->birth_country;
        $mem_account->birth_city = $request->birth_city;
        $mem_account->passed_country = $request->passed_country;
        $mem_account->passed_city = $request->passed_city;
        $mem_account->domain = $request->domain;
        $mem_account->personal_phrase = $request->personal_phrase;
        $mem_account->hobbies = $request->hobbies;
        $mem_account->users_id = Auth::user()->id;
        $mem_account->status = $request->status;
        $mem_account->qr_code = $request->qr_code; 
        if($mem_account->save()){
            if($request->has('families')){
                foreach ($request->families as $key => $family) {
                    $mem_family = new MemmorialFamily();
                    $mem_family->memorial_id = $mem_account->id;
                    $mem_family->relations_id = $family->relations_id;
                    $mem_family->name = $family->name;
                    $mem_family->type = $family->type;
                    $mem_family->users_id = Auth::user()->id;
                    $mem_family->save();
                }
            }
            if($request->has('educations')){
                foreach ($request->educations as $education) {
                    $mem_education = new MemmorialEducation();
                    $mem_education->course_id = $education->course_id;
                    $mem_education->memorial_id = $mem_account->id;
                    $mem_education->stream = $education->stream;
                    $mem_education->start_at = $education->start_at;
                    $mem_education->end_at = $education->end_at;
                    $mem_education->users_id = Auth::user()->id;
                    $mem_education->save();
                }
            }
            if($request->has('positions')){
                foreach ($request->positions as $position) {
                    $mem_positions = new MemmorialPosition();
                    $mem_positions->positions_id = $position->positions_id;
                    $mem_positions->memorial_id = $mem_account->id;
                    $mem_positions->organisation = $request->organisation;
                    $mem_positions->descriptions = $request->descriptions;
                    $mem_positions->users_id = Auth::user()->id;
                    $mem_positions->save();
                }
            }
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
