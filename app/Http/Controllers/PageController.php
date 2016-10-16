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
}
