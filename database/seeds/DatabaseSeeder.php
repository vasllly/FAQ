<?php

use Illuminate\Database\Seeder;

use App\User;

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

        User::create([
            'login' => 'admin',
            'email' => 'admin@admin.ru',
            'password' => Hash::make('admin')
        ]);
    }
}
