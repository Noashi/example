<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Age;

class AgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ages')->delete();

        for ($i = 1; $i <= 6; $i++) {
            if ($i == 1) {
                Age::create([
                    'age' => '10代以下',
                    'sort' => $i
                ]);
            } else if ($i == 6) {
                Age::create([
                    'age' => '60代以上',
                    'sort' => $i
                ]);
            } else {
                Age::create([
                    'age' => sprintf('%d0代', $i),
                    'sort' => $i
                ]);
            }
        }
    }
}
