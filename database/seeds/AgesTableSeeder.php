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
            Age::create([
                'age' => $i,
                'sort' => $i
            ]);
        }
    }
}
