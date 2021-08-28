<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Hashing\HashManager;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(HashManager $hashManager): void
    {
        User::create([
            'name' => 'admin',
            'password' => $hashManager->make('admin'),
            'email' => 'admin@mail.com',
        ])->roles()->sync(Role::where('name','admin')->first());
    }
}
