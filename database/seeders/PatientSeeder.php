<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('patients')->insert([
            ['email' => 'john@gmail.com',
             'fname'=> 'John',
             'lname'=> 'Robinson',
             'dob'=> '22/10/1990',
             'contactNumber'=> '18762389467',
            ],
            ['email' => 'sam@gmail.com',
             'fname'=> 'Samuel',
             'lname'=> 'Jones',
             'dob'=> '15/10/1956',
             'contactNumber'=> '18764889455',
            ]

        ]);
    }
}
