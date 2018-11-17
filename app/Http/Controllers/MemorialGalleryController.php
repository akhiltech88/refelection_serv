<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MemmorialGallery;
use App\MemmorialPackage;
use Auth;
use Validator;
use Response;

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
           $photo_dt = MemmorialPackage::with('package')->whereMemorialId($request->memorial_id)->first();
           $gall_cnt = MemmorialGallery::whereType(1)
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
            $gallery = new MemmorialGallery;
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
        $data = '<div class="col-sm-3"><a href="'.$gallery->media_url.'" data-lightbox="image-1"><img src="'.$gallery->media_url.'"></a></div>';
        $response = array(
            'success' => 'true',
            'code' => 200,
            'data' => $data
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
            $gallery = MemmorialGallery::Where('id', $request->gallery_id);
            $gallery->delete();
            return redirect('profile/'.$request->domain);
        }
    }
}
