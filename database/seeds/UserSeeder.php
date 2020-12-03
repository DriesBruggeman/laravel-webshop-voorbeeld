<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'firstname' => 'Dries',
            'lastname' => 'Bruggeman',
            'email' => 'dries.bruggeman@student.odisee.be',
            'password' => '$2y$10$pntJXBXThCw7d2uQrepTje0xTFTm12kqb9Uhc.NzQ2WLX9GYsWc5S', //Azerty123
            'remember_token' => Str::random(10),
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'firstname' => 'Elian',
            'lastname' => 'Van Cutsem',
            'email' => 'elian.vancutsem@student.odisee.be',
            'password' => '$2y$10$pntJXBXThCw7d2uQrepTje0xTFTm12kqb9Uhc.NzQ2WLX9GYsWc5S', //Azerty123
            'remember_token' => Str::random(10),
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'firstname' => 'Aaron',
            'lastname' => 'Lison',
            'email' => 'aaron.lison@student.odisee.be',
            'password' => '$2y$10$pntJXBXThCw7d2uQrepTje0xTFTm12kqb9Uhc.NzQ2WLX9GYsWc5S', //Azerty123
            'remember_token' => Str::random(10),
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
