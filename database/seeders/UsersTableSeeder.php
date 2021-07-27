<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@admin.com')->first();

        if (!$user) {
            User::create([

                'name' => 'Angelino Verhaeghe',
                'email' => 'admin@admin.com',
                'role' => 'Administrator',
                'password' => Hash::make('12345678')
            ]);
        }
    }
}
