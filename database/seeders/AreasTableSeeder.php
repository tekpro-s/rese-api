<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class AreasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '東京都',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('areas')->insert($param);

        $param = [
            'name' => '大阪府',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('areas')->insert($param);

        $param = [
            'name' => '福岡県',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
        DB::table('areas')->insert($param);
    }
}
