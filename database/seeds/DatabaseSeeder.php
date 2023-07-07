<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'super Admin',
            'email' => 'superAdmin@yahoo.com',
            'password' => Hash::make('123456'),
        ]);
    }
}
