<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
		$image = new Image();
		
		$image->title = $request->input('title');
		$image->description ="";

		if(!empty($this->request->file('image'))) {
			$file = $this->request->file('image');
            //getting timestamp
			$timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());

			$name = $timestamp. '-' .$file->getClientOriginalName();

			$image->filePath = $name;

			$file->move(public_path().'/image/', $name);
		}
		$image->save();
		//$image->create();
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

}
