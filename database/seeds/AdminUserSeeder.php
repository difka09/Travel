<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@travel.test',
            'password' => bcrypt('12345678'),
            'phone' => null,
            'photo' => null
        ]);

        $admin->assignRole('admin');
    }
}
