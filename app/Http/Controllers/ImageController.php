<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Image;

use Guzzle\Tests\Plugin\Redirect;
use Illuminate\Support\Facades\Input;

class ImageController extends Controller
{
	protected $request;
	protected $image;

	public function __construct(Request $request, Image $image)
	{
		$this->request = $request;
		$this->image   = $image;
	}

	public function store(Request $request)
	{
        $image = new Image();
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required'
        ]);
        $image->title = $request->title;
        $image->description = $request->description;
		if($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .$file->getClientOriginalName();
            
            $image->filePath = $name;

            $file->move(public_path().'/images/', $name);
        }
        $image->save();
        return $this->create()->with('success', 'Image Uploaded Successfully');
	}

}
