<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Entry extends Model
{
	use SoftDeletes;

	protected $table = 'entries'; 
	protected $fillable = ['title', 'content', 'category'];
	protected $dates = ['deleted_at'];   
	public $timestamps = true;
}
