<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('owners')->insert([
            [
                'name' => 'test1',
                'email' => 'test1@fake.com',
                'password' => Hash::make('password'),
                'created_at' => '2022/02/16 16:16:16'
            ],
            [
                'name' => 'test2',
                'email' => 'test2@fake.com',
                'password' => Hash::make('password'),
                'created_at' => '2022/02/16 16:16:16'
            ],
            [
                'name' => 'test3',
                'email' => 'test3@fake.com',
                'password' => Hash::make('password'),
                'created_at' => '2022/02/16 16:16:16'
            ],
        ]);
        
    }
}
