<?php

use Illuminate\Database\Seeder;
use App\User;

class dummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id_user' => uniqid(),
            'nis' => '1',
            'name' => 'admin',
            'role' => '1',
            'email' =>'admin@mail.com',
            'saldo' => '10000',
            'password' => Hash::make('admin'),
            'remember_token' => uniqid(),
        ]);

        User::create([
            'id_user' => uniqid(),
            'nis' => '3',
            'name' => 'gudang',
            'role' => '3',
            'email' =>'gudang@mail.com',
            'saldo' => '10000',
            'password' => Hash::make('gudang'),
            'remember_token' => uniqid(),
        ]);
    }
}
