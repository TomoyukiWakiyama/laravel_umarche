<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSheeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('shops')->insert([
            [
                'owner_id' => 1,
                'name' => 'ShopName1',
                'information' => 'Shopinformation1',
                'filename' => '',
                'is_selling' => true,
            ],
            [
                'owner_id' => 2,
                'name' => 'ShopName2',
                'information' => 'Shopinformation2',
                'filename' => '',
                'filename' => 'ShopName1',
                'is_selling' => true,
            ],
        ]);
    }
}
