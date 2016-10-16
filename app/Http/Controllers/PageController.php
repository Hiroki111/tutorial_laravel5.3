<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Entry;
use App\Http\Requests;

class PageController extends Controller
{
	protected $request;
	protected $entry;

	public function __construct(Request $request, Entry $entry)
	{
		$this->request = $request;
		$this->entry    = $entry;
	}

	public function index()
	{
		return view('www.index', [
			'entries' => $this->entry->all(),
			'currentEntry' => $this->entry->find(1),
			]);
	}

	public function show($url)
	{
		$entry = $this->entry->where('url', '/'.$url)->first();

		if(empty($entry)){
			$entry = $this->entry->find(1);
		}

		return view('www.index', [
			'entries' => $this->entry->all(),
			'currentEntry' => $entry,
			]);
	}
}
