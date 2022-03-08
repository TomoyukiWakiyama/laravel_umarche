<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('admins')->insert([
            'name' => 'test',
            'email' => 'test@fake.com',
            'password' => Hash::make('password'),
            'created_at' => '2022/02/16 16:16:16'
        ]);
    }
}
