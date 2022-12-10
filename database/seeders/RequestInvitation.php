<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestInvitation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('request_invitations')->count() > 0) {
            return;
        }

        DB::table('request_invitations')->insert([
            ['sent_invitation' => '1' , 'received_invitation' => '2'],
            ['sent_invitation' => '1' , 'received_invitation' => '3'],
            ['sent_invitation' => '1' , 'received_invitation' => '4'],
            ['sent_invitation' => '1' , 'received_invitation' => '5'],
            ['sent_invitation' => '1' , 'received_invitation' => '6'],
            ['sent_invitation' => '1' , 'received_invitation' => '7'],
            ['sent_invitation' => '1' , 'received_invitation' => '8'],
            ['sent_invitation' => '1' , 'received_invitation' => '9'],
            ['sent_invitation' => '1' , 'received_invitation' => '10'],
            ['sent_invitation' => '1' , 'received_invitation' => '11'],


            ['sent_invitation' => '2' , 'received_invitation' => '3'],
            ['sent_invitation' => '2' , 'received_invitation' => '4'],
            ['sent_invitation' => '2' , 'received_invitation' => '5'],
            ['sent_invitation' => '2' , 'received_invitation' => '6'],

            ['sent_invitation' => '3' , 'received_invitation' => '4'],
            ['sent_invitation' => '3' , 'received_invitation' => '5'],
            ['sent_invitation' => '3' , 'received_invitation' => '6'],
            ['sent_invitation' => '3' , 'received_invitation' => '7'],
            ['sent_invitation' => '3' , 'received_invitation' => '8'],

            ['sent_invitation' => '4' , 'received_invitation' => '5'],
            ['sent_invitation' => '4' , 'received_invitation' => '6'],
            ['sent_invitation' => '4' , 'received_invitation' => '7'],
            ['sent_invitation' => '4' , 'received_invitation' => '8'],
            ['sent_invitation' => '4' , 'received_invitation' => '9'],

            ['sent_invitation' => '5' , 'received_invitation' => '6'],
            ['sent_invitation' => '5' , 'received_invitation' => '7'],
            ['sent_invitation' => '5' , 'received_invitation' => '8'],
            ['sent_invitation' => '5' , 'received_invitation' => '9'],
            ['sent_invitation' => '5' , 'received_invitation' => '10'],


        ]);
    }
}
