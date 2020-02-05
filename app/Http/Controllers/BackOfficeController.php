<?php

namespace Shopinvest\Http\Controllers;

use Illuminate\Http\Request;
use Shopinvest\Http\Controllers\Controller;
use Shopinvest\Product;
use Shopinvest\Brand;
use Shopinvest\Image;

class BackOfficeController extends Controller {
    /**
     * 
     *
     * @param  int  $id
     * @return Response
     */
    public function show( Request $request ) {
		
		
		// Get product view
		$productAr = Product::all();
		
		$brandAr = Brand::all();
		$imageAr = Image::all();
		
		// var_dump($productAr);
		
		// return;
		
		// Render
        return view('backoffice_show', [
			'brandAr' => $brandAr,
			'productAr' => $productAr,
			'imageAr' => $imageAr,
		]);
    }
	
	/**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function create_brand( Request $request ) {
		// TODO: handle auth
		$o = $this->validate($request, [
			'label' => ['required', 'max:255'],
		]);
		
		$brand = Brand::create( $request->only(['label',]) );
		$brand->save();
		
		return redirect(route('backoffice.show'));
	}
}