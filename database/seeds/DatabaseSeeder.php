<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        User::create([
            'name' => "admin",
            'email' => "pmo.intranet@advanzer.com",
            'password' => Hash::make("admin"),
        ]);
    }
}
