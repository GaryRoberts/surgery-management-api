<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            ['roomName' => 'OperatingRoom1'],
            ['roomName' => 'OperatingRoom2'],
            ['roomName' => 'OperatingRoom3']
        ]);

    }
}
