<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Setting extends Model
{
    protected $primaryKey = 'id';
    protected $table      = 'settings';
    protected $fillable   = array('key', 'json',
        'created_at', 'updated_at', 'deleted_at');
    public $timestamps = true;
    use SoftDeletes;
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
}
