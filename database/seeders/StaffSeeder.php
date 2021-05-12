<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->insert([
            ['email' => 'admin@speurgroup.com',
             'staffType'=> 'ADMIN',
             'fname'=> 'Admin',
             'lname'=> 'Member',
             'phone'=> '18764569455',
             'password' => Hash::make('admin'),
            ],
            ['email' => 'tashana@speurgroup.com',
            'staffType'=> 'DOCTOR',
            'fname'=> 'Tashana',
            'lname'=> 'Gordon',
            'phone'=> '18764563555',
            'password' => Hash::make('password'),
            ],
            ['email' => 'william@speurgroup.com',
            'staffType'=> 'DOCTOR',
            'fname'=> 'William',
            'lname'=> 'Johnson',
            'phone'=> '18766234459',
            'password' => Hash::make('password'),
           ],
           ['email' => 'simone@speurgroup.com',
            'staffType'=> 'RECEPTIONIST',
            'fname'=> 'Simone',
            'lname'=> 'Benjamin',
            'phone'=> '18764533771',
            'password' => Hash::make('password'),
           ]

        ]);

    }
}
