<?php

namespace Shopinvest;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
    protected $table = 'image';
	public $timestamps = false;
	
	protected $fillable = [
        'location',
    ];
}
