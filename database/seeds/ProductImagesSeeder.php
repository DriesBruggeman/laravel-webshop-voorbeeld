<?php

use Illuminate\Database\Seeder;

class ProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_images')->insert([
            'product_id' => 1,
            'path' => 'images/S9IVZB06-1.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 2,
            'path' => 'images/PL6HZB88-1.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 2,
            'path' => 'images/PL6HZB88-2.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 2,
            'path' => 'images/PL6HZB88-3.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 3,
            'path' => 'images/OCBVOO-1.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 3,
            'path' => 'images/OCBVOO-2.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 3,
            'path' => 'images/OCBVOO-3.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 4,
            'path' => 'images/EZKJFT-1.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 4,
            'path' => 'images/EZKJFT-2.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 5,
            'path' => 'images/MJ#CF5-1.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 5,
            'path' => 'images/MJ#CF5-2.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 6,
            'path' => 'images/S5IVZB2R-1.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 7,
            'path' => 'images/PL8MZB3M-1.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_images')->insert([
            'product_id' => 8,
            'path' => 'images/9AO1AASV-1.jpg',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
