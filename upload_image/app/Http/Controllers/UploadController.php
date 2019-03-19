<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Input;
use Validator;
use Redirect;
use View;
use App\Http\Requests\imageUploadValidator;
use \App\Exceptions\CustomException;

class UploadController extends Controller {

	public function view() {
		return view('imageUpload');
	}

	public function upload(imageUploadValidator $request) {
		
		throw new CustomException('Something Went Wrong.');
		
		// $file = $request->file('image');
		// // image upload in public/upload folder.
		// $file->move('uploads', $file->getClientOriginalName()); 
		// echo 'Image Uploaded Successfully';
	}
}