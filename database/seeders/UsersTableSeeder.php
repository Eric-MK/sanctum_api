<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;//DB is a facade for the Illuminate\Database\DatabaseManager class, which provides a simple way to interact with the database tables
use Illuminate\Support\Facades\Hash;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'name' => 'Mike Kerry',
            'email' => 'kerry@mike.com',
            'password' => Hash::make('password')
        ]);
    }
}
