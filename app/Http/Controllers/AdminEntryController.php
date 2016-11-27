<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;
use App\Image;

class AdminEntryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $request;
    protected $entry;
    protected $image;

    public function __construct(Request $request, Entry $entry, Image $image)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->entry = $entry;
        $this->image   = $image;
    }


    public function home()
    {
        return view('auth.home');
    }

    public function index()
    {
        return view('auth.entries.list', [
            'entries' => $this->entry->all(),
            ]);
    }

    public function create()
    {
        return view('auth.entries.edit', [
            'images' => $this->image->all(),
            ]);
    }

    // public function uploadPicture()
    // {
    //     if ($this->request->hasFile('image')) {
    //         $this->saveImage();
    //         $message = "New image has been uploaded";
    //     } else {

    //         $message = "No image found!";
    //     }

    //     return redirect('/admin/entries/create')
    //     ->with('message',$message);
    // }

    public function saveImage()
    {
        $image                = Image::make($this->request->file('image'));

        if ($width > 300 || $height > 300) {
            $image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        $image->save(public_path(env('IMAGE_DIRECTORY') . date("Y/m/d:h:i") . '_image.jpg'));
    }


    public function store()
    {

        $this->validate($this->request, [
            'title' => 'bail|required|unique:entries|max:255',
            'content' => 'required',
            ]);

        $url = '/'.$this->cleanStringForUrl($this->request->input('title', ''));



        $this->entry->create([
            'title' => $this->request->input('title', ''),
            'url' => $url,
            'category'      => $this->request->input('category', ''),
            'content'       => $this->request->input('content', ''),
            ]);

        return redirect()->route('/admin/entries/create', [
            'images' => $this->image->all(),
            ])
        ->with('message', "New : ".$this->request->input('title', '') . ' was added');

        // return redirect('/admin/entries/create', [
        //     'images' => $this->image->all(),
        //     ])
        // ->with('message', "New : ".$this->request->input('title', '') . ' was added');
    }

    public function edit($id)
    {
        return view('auth.entries.edit', [
            'entry' => $this->entry->find($id),
            'images' => $this->image->all(),
            ]);
    }

    
    public function cleanStringForUrl($string)
    {
        $string = str_replace(' ', '_', $string); 
        $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $string); 
        return preg_replace('/-+/', '-', $string);
    }


    public function update($id)
    {

        $url = '/'.$this->cleanStringForUrl($this->request->input('title', ''));


        $editedEntry                 = $this->entry->find($id);
        $editedEntry->title          = $this->request->input('title', '');
        $editedEntry->url = $url;
        $editedEntry->category       = $this->request->input('category', '');
        $editedEntry->content        = $this->request->input('content', '');

        $editedEntry->save();

        return redirect()->route('/admin/entries/' . $id . '/edit', [
            'images' => $this->image->all(),
            ])
        ->with('message', 'Edit was saved');

        //return redirect('/admin/entries/' . $id . '/edit')->with('message', 'Edit was saved');
    }

    public function destroy($id)
    {
        $entry = $this->entry->find($id);

        $this->entry->destroy($id);

        return redirect()->route('/admin/entries', [
            'images' => $this->image->all(),
            ]);

        //return redirect('/admin/entries');
    }

}
