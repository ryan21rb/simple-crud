<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'ryan admin',
                'email'=>'ryan@gmail.com',
                'role'=>'admin',
                'password'=>bcrypt('123456')
            ],
            [
                'name'=>'ryan staff',
                'email'=>'ryan@gmail.com',
                'role'=>'staff',
                'password'=>bcrypt('123456')
            
            ],
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
