<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('primary_categories')->insert([
            [
                'name' => 'バッグ',
                'sort_order' => 1,
            ],
            [
                'name' => '財布・ケース',
                'sort_order' => 2,
            ],
            [
                'name' => '帽子',
                'sort_order' => 3,
            ],
        ]);

        DB::table('secondary_categories')->insert([
            [
                'name' => 'レディースバッグ',
                'sort_order' => 1,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'メンズバッグ',
                'sort_order' => 2,
                'primary_category_id' => 1,
            ],
            [
                'name' => 'エコバッグ',
                'sort_order' => 3,
                'primary_category_id' => 1,
            ],

            [
                'name' => '名刺入れ',
                'sort_order' => 1,
                'primary_category_id' => 2,
            ],
            [
                'name' => 'クレジットカードケース',
                'sort_order' => 2,
                'primary_category_id' => 2,
            ],
        ]);
    }
}
