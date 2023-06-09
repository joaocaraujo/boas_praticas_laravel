<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        \App\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => \Illuminate\Support\Facades\Hash::make(123456)
        ]);

        $this->call(OrdersTableSeeder::class);
    }
}
