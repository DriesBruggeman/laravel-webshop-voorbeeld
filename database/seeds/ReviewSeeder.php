<?php

use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_reviews')->insert([
            'product_id' => 1,
            'user_id' => 1,
            'rating' => 5,
            'review' => 'Zeer goede computer',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_reviews')->insert([
            'product_id' => 1,
            'user_id' => 2,
            'rating' => 3,
            'review' => 'Goede pc maar wel duur',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_reviews')->insert([
            'product_id' => 1,
            'user_id' => 3,
            'rating' => 4,
            'review' => 'Heel erg tof. Ik kan er alles op doen zoals veel Docker containers draaien om mijn php labo\'s in te maken. Gelukkig legt Dries mij migrations uit anders was ik nog lang niet klaar!',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('product_reviews')->insert([
            'product_id' => 2,
            'user_id' => 1,
            'rating' => 4,
            'review' => 'Goede laptop',
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
