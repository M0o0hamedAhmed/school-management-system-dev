<?php

namespace Database\Seeders;

use App\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = new User();
        $super_admin->email = "admin@admin.com";
        $super_admin->password = bcrypt('admin@admin.com');
        $super_admin->name = "Mohamed Ahmed";
        $super_admin->save();
    }
}
