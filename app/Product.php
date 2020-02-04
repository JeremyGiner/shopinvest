<?php

namespace Shopinvest;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'product';

	protected $fillable = [
        'location',
    ];

    /**
     * Get the comments for the blog post.
     */
    public function imageAr() {
        return $this->belongsToMany(Image::class, 'product__image');
    }
	
	/**
     * Get the phone record associated with the user.
     */
    public function brand() {
	
        return $this->belongsTo(Brand::class);
    }
}
