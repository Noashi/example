<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        User::create([
            'name' => '管理者',
            'email' => 'admin@example.com',
            'password' => bcrypt("password"),
            'role' => '1',
        ]);
    }
}
