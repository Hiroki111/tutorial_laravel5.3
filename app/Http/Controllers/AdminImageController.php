<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;
use App\Http\Requests;
use App\Image;
use File;

use Guzzle\Tests\Plugin\Redirect;
use Illuminate\Support\Facades\Input;

class AdminImageController extends Controller
{
	protected $request;
	protected $image;

	public function __construct(Request $request, Image $image)
	{
		$this->middleware('auth');
		$this->request = $request;
		$this->image   = $image;
	}

	public function index()
	{
		return view('auth.images.list', [
			'images' => $this->image->all(),
			]);
	}


	public function store(Request $request)
	{

		$validator = Validator::make($request->all(), [
			'title' => 'required|max:255',
			]);

		if ($validator->fails()) {
			return redirect('/admin/images')->with('message', 'Title was missing!');
		}

		if(!empty($this->request->file('image'))) {
			$image = new Image();			
			$image->title = $request->input('title');
			$image->description ="";
			$file = $this->request->file('image');
			$timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
			$image->filePath = $timestamp. '-' .$this->cleanStringForUrl($image->title);

			$file->move(public_path().'/image/', $image->filePath);
		}
		$image->save();

		return redirect('/admin/images')->with('message', 'Saved.');
	}

	public function deleteImages()
	{
		$Ids = $this->request->input('imageIds');

		foreach ($Ids as $id) {
			$image = Image::find($id);
			File::delete(public_path().'/image/'.$image->filePath);
			$image->destroy($id);
		}
		
		return redirect('/admin/images')
		->with('message', 'Image deleted');
	}

	public function cleanStringForUrl($string)
	{
		$string = str_replace(' ', '_', $string); 
		$string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string); 
		return preg_replace('/-+/', '-', $string);
	}

}
