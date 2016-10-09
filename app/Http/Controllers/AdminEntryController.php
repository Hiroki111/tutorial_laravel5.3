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
            'title' => 'bail|required|unique:entries|max:255',
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

    public function edit($id)
    {
        return view('auth.entries.edit', [
            'entry' => $this->entry->find($id),
            ]);
    }

    public function update($id)
    {
        $editedEntry                 = $this->entry->find($id);
        $editedEntry->title          = $this->request->input('title', '');
        $editedEntry->category       = $this->request->input('category', '');
        $editedEntry->content        = $this->request->input('content', '');
        $editedEntry->save();
        return redirect('/admin/entries/' . $id . '/edit')->with('message', 'Edit was saved');
    }

    public function destroy($id)
    {
        $entry = $this->entry->find($id);
        
        $this->entry->destroy($id);
        return redirect('/admin/entries');
    }

}
