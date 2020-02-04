<?php

namespace Shopinvest\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Shopinvest\Http\Controllers\Controller;
use Shopinvest\Product;

class ProductController extends Controller {
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id,$name) {
		
		// Get product view
		$productAr = DB::table('product')
			->join('product__image', 'product.id', '=', 'product__image.product_id')
			->get()
		;
		$product = Product::findOrFail($id);
		// var_dump($productAr);
		
		// return;
		
		// Render
        return view('product_show', [
			'nav' => [
				$this->_createNavItemView( 'Acceuil', '/' ),
				$this->_createNavItemView( 'Femme', '/' ),
				$this->_createNavItemView( 'Top', '/' ),
				$this->_createNavItemView( $product->label, '/' ),
			],
			'product' => $product,
		]);
    }
	
	private function _createNavItemView( $label, $link = null) {
		return (object)['label' => $label, 'link' => $link];
	}
	
	private function _getProductView() {
		
	}
}