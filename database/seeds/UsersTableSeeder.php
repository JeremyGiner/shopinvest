<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // DB::table('image')->insert([
            // 'location' => str_random(10).'.png',
        // ]);
		DB::table('product')->delete();
		DB::table('image')->delete();
		DB::table('brand')->delete();
		
		
		Shopinvest\Product::create([
			'label' => 'product 1',
			'price' => 1234,
			'brand_id' => Shopinvest\Brand::create(array('label' => 'Titi'))->id,
		])->imageAr()->saveMany([
			Shopinvest\Image::create(array('location' => 'toto.png')),
			Shopinvest\Image::create(array('location' => 'titi.png')),
			Shopinvest\Image::create(array('location' => 'tutu.png')),
		]);
		
		// factory(Shopinvest\Image::class, 50)->create();
		// factory(Shopinvest\Brand::class, 10)->create();
		// factory(Shopinvest\Product::class, 10)->create()->each(function ($o) {
			// $o->getImageAr()
				// ->saveMany( [
					// factory(Shopinvest\Image::class )->make(),
					// factory(Shopinvest\Image::class )->make(),
					// factory(Shopinvest\Image::class )->make(),
					// factory(Shopinvest\Image::class )->make(),
				// ])
			// ;
			// $o->brand = factory(Shopinvest\Brand::class )->make();
		// });
    }
}
