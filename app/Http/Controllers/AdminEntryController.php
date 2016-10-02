<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entry;


class AdminEntryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $request;
    protected $entry;

    public function __construct(Request $request, Entry $entry)
    {
        $this->middleware('auth');
        $this->request = $request;
        $this->entry = $entry;
    }


    public function home()
    {
        return view('auth.home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.entries.list', [
            'entries' => $this->entry->all(),
            ]);
    }

    public function create()
    {
        return view('auth.entries.edit');
    }

    public function store()
    {

        $this->validate($this->request, [
            'title' => 'bail|required|unique:entries|max:50',
            'content' => 'required',
            ]);


        $this->entry->create([
            'title' => $this->request->input('title', ''),
            'category'      => $this->request->input('category', ''),
            'content'       => $this->request->input('content', ''),
            ]);

        return redirect('/admin/entries/create')
        ->with('message', "New : ".$this->request->input('title', '') . ' was added');
    }

    // public function settings()
    // {
    //     return view('auth.settings');
    // }
}
