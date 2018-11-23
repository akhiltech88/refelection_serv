<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MemorialGallery;
use App\MemorialPackage;
use App\MemorialAccount;
use Auth;
use Validator;
use Response;
use FFMpeg;
use URL;

class MemorialGalleryController extends Controller
{
    public function imageUpload(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'userImage' => 'required | mimes:jpeg,jpg,png',
        ]);

        $memorial_account = MemorialAccount::find($request->memorial_id);
        if( !isset($memorial_account)  ){
            $response = array(
                    'success' => 'false',
                    'code' => 422,
                    'message' => "Memorial Account Not Found!!"
                );
                return response($response, 200);
        }else{
           $photo_dt = MemorialPackage::with('package')->whereMemorialId($request->memorial_id)->first();
           $gall_cnt = MemorialGallery::whereType(1)
                    ->where('memorial_id',$request->memorial_id)
                    ->count();
           if( intval($photo_dt->package->value) <=  intval($gall_cnt) ){
                $response = array(
                    'success' => 'false',
                    'code' => 422,
                    'message' => "Please upgrade your package for adding more photos"
                );
                return response($response, 200);
           }
        }

        if ($validator->fails()) {
        	$response = array(
                'success' => 'false',
                'code' => 422,
                'message' => "image must be of jpeg,jpg,png"
            );
            return response($response, 200);
        }
    	if ($request->hasFile('userImage')) {
            $name = "photo".time();
            $extension1 = $request->userImage->extension();
            $request->file('userImage')->move(public_path().'/gallery',$name.".".$extension1);
            $gallery = new MemorialGallery;
            if(Auth::check()){
        		$gallery->users_id = Auth::user()->id;
        	}else{
        		$gallery->users_id = 2;
        	}
        	$gallery->type = 1;
        	$gallery->memorial_id = $request->memorial_id;
            $gallery->media_url = "gallery/".$name.".".$extension1;
            $gallery->save();

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
        }
        $data = '<div class="item" ><label><img style="width: 100%;height: 100%" src="'.$gallery->media_url.'"></label></div>';
        $response = array(
            'success' => 'true',
            'code' => 200,
            'data' => $data
        );
        return response($response, 200);
    }
    public function audioUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'userAudio' => 'required | mimes:mp3,ogg,wav,mpga,ogx',
        ]);
        if ($validator->fails()) {
            $response = array(
                'success' => 'false',
                'code' => 422,
                'message' => "Audio must be of mp3,ogg,wav,mpga"
            );
            return response($response, 200);
        }
        if ($request->hasFile('userAudio')) {
            $name = "audio".time();
            $extension1 = $request->userAudio->extension();
            $orginalname = $request->userAudio->getClientOriginalName();
            $orginalname = pathinfo($orginalname, PATHINFO_FILENAME);
            $orginalname = ucwords(str_replace("_", " ", $orginalname));
            $request->file('userAudio')->move(public_path().'/gallery',$name.".".$extension1);
            $gallery = new MemorialGallery;
            if(Auth::check()){
                $gallery->users_id = Auth::user()->id;
            }else{
                $gallery->users_id = 2;
            }
            $gallery->type = 0;
            //$gallery->title = $orginalname ;
            $gallery->memorial_id = $request->memorial_id;
            $gallery->media_url = "gallery/".$name.".mp3";
            $gallery->save();
        }
        /*$ffmpeg = FFMpeg\FFMpeg::create();
        $audio = $ffmpeg->open("gallery/".$name.".".$extension1);

        $format = new FFMpeg\Format\Audio\Mp3();

        $format
            ->setAudioChannels(2)
            ->setAudioKiloBitrate(100);

        $audio->save($format, "gallery/".$name .".mp3");
            
        $data = '<div class="col-md-6"><h5>'.$orginalname .'</h5><audio controls="controls">
                                    <source src="'.$gallery->media_url.'" type="audio/mp3"></audio></div>';*/
        $response = array(
            'success' => 'true',
            'code' => 200,
            'data' => 'Success'
        );
        return response($response, 200);
    }
    public function videoUpload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'video_url' => 'required',
        ]);
        if ($validator->fails()) {
            $response = array(
                'success' => 'false',
                'code' => 422,
                'message' => "Video Url Required!"
            );
            return response($response, 200);
        }
        $gallery = new MemorialGallery;
            if(Auth::check()){
                $gallery->users_id = Auth::user()->id;
            }else{
                $gallery->users_id = 2;
            }
            $gallery->type = 2;
            //$gallery->title = $orginalname ;
            $gallery->memorial_id = $request->memorial_id;
            $gallery->media_url = $request->video_url;
            $gallery->save();
            $response = array(
            'success' => 'true',
            'code' => 200,
            'data' => 'Success'
        );
        return response($response, 200);
    }
    public function deleteMedia(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gallery_id' => 'required',
        ]);

        if ($validator->fails()) {
            return back();
        }else{
            $gallery = MemorialGallery::Where('id', $request->gallery_id);
            $gallery->delete();
            return redirect('profile/'.$request->domain);
        }
    }
}
