<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user =User::create([
            'username' => 'Gerente123',
            'email' => 'Gerente123@gmail.com',
            'password' => bcrypt('Gerente123')
        ]);

        $user->assignRole('Gerente');
    }
}
