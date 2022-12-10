<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConnectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('user_connections')->count() > 0) {
            return;
        }

        DB::table('user_connections')->insert([
            ['user_id' => '1' , 'user_connection_id' => '20'],
            ['user_id' => '1' , 'user_connection_id' => '21'],
            ['user_id' => '1' , 'user_connection_id' => '22'],
            ['user_id' => '1' , 'user_connection_id' => '23'],
            ['user_id' => '1' , 'user_connection_id' => '24'],


            ['user_id' => '2' , 'user_connection_id' => '24'],
            ['user_id' => '2' , 'user_connection_id' => '25'],
            ['user_id' => '2' , 'user_connection_id' => '26'],
            ['user_id' => '2' , 'user_connection_id' => '27'],

            ['user_id' => '3' , 'user_connection_id' => '23'],
            ['user_id' => '3' , 'user_connection_id' => '24'],
            ['user_id' => '3' , 'user_connection_id' => '25'],
            ['user_id' => '3' , 'user_connection_id' => '26'],
            ['user_id' => '3' , 'user_connection_id' => '27'],

        ]);
    }
}
