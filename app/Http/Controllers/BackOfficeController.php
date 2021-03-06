<?php

namespace Shopinvest\Http\Controllers;

use Illuminate\Http\Request;
use Shopinvest\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
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
	
	
    public function create_brand( Request $request ) {
		// TODO: handle auth
		$o = $this->validate($request, [
			'label' => ['required', 'max:255'],
		]);
		
		$brand = Brand::create( $request->only(['label',]) );
		$brand->save();
		
		return redirect(route('backoffice.show'));
	}
	
    public function update_brand( Request $request, $id ) {
		// TODO: handle auth
		$o = $this->validate($request, [
			'label' => ['required', 'max:255'],
		]);
		
		$brand = Brand::findOrFail($id);
		$brand->fill($request->only(['label',]));
		$brand->save();
		
		return redirect(route('backoffice.show'));
	}
//___________________________________________________________

    public function create_product( Request $request ) {
		// TODO: handle auth
		$o = $this->validate($request, [
			'label' => ['required', 'max:255'],
			'description' => ['required', 'max:600'],
			'price' => ['required', 'integer'],
			'brand_id' => [Rule::exists('brand','id'),]
		]);
		
		//_____________________________
		// Create image
		$fileAr = $request->file('image');
		
		
		//TODO: check fileAr is an array
		$imageAr = [];
		foreach( $fileAr as $file ) {
			if( !$file->isValid() ) {
				//TODO : retrn bad request & error message
				return redirect(route('backoffice.show'));
			}
			
			$filename = $this->_getUniqLocation($file->extension());
			$file->storeAs('public/image', $filename);
			
			$image = Image::create( ['location' => $filename] );
			$image->save();
			
			$imageAr[] = $image;
		}
		
		//_____________________________
		// Create product
		
		$product = Product::create( $request->only(['label','description','price','brand_id']) );
		$product->imageAr()->saveMany( $imageAr );
		$product->save();
		
		return redirect(route('backoffice.show'));
	}
	
	public function edit_product( Request $request, $id ) {
		
		$product = Product::findOrFail($id);
		$brandAr = Brand::all();
		
		return view('backoffice_edit_product', [
			'product' => $product,
			'brandAr' => $brandAr,
		]);
	}
	
	public function update_product( Request $request, $id ) {
		// TODO: handle auth
		$o = $this->validate($request, [
			'label' => ['required', 'max:255',],
		]);
		
		$brand = Product::findOrFail($id);
		$brand->fill($request->only(['label',]));
		$brand->save();
		
		return redirect(route('backoffice.show'));
	}
	
	public function delete_product( Request $request ) {
		// TODO: handle auth
		$o = $this->validate($request, [
			'id' => ['required', 'integer',Rule::exists('product','id'),],
		]);
		
		$product = Product::findOrFail($request->input('id'));
		//TODO : delete all image
		$product->imageAr()->delete();
		$product->delete();
		
		return redirect(route('backoffice.show'));
	}
	
//___________________________________________________________


    public function create_product_image( Request $request ) {
		// TODO: handle auth
		$o = $this->validate( $request, [
			'product_id' => ['required', 'integer',],
		] );
		
		//_____________________________
		// Create image
		$fileAr = $request->file('image');
		
		//TODO: check fileAr is an array
		// TODO: merge with create product
		$imageAr = [];
		foreach( $fileAr as $file ) {
			if( !$file->isValid() ) {
				//TODO : retrn bad request & error message
				return redirect(route('backoffice.show'));
			}
			
			$filename = $this->_getUniqLocation($file->extension());
			$file->storeAs('public/image', $filename);
			
			$image = Image::create( ['location' => $filename] );
			$image->save();
			
			$imageAr[] = $image;
		}
		
		//_____________________________
		// Create product
		
		$product = Product::create( $request->only(['label','description','price','brand_id']) );
		$product->imageAr()->saveMany( $imageAr );
		$product->save();
		
		return redirect(route('backoffice.show'));
	}


	public function delete_product_image( Request $request ) {
		// TODO: handle auth
		$o = $this->validate( $request, [
			'product_id' => ['required', 'integer',],
			'image_id' => ['required', 'integer', Rule::exists('image','id'),],
		] );
		
		$product = Product::findOrFail($request->input('product_id'));
		$product->imageAr()->detach($request->input('image_id'));
		Image::destroy($request->input('image_id'));
		// TODO : remove file from disk
		
		return redirect(route('backoffice.show'));
	}

//___________________________________________________________

	function _getUniqLocation( $ext ) {
		do {
			$file_name = md5(time()) . '.' . $ext;
			$image = Image::where('location', $file_name)->get();
		} while(!$image->isEmpty());
		return $file_name;
	}

}