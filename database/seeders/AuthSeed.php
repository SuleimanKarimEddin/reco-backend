<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AuthSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::updateOrCreate([
            "email"=>'admin@admin.com',
        ], [
            "email"=>'admin@admin.com',
            "name"=>"Super Admin",
            "password"=>Hash::make("password"),
        ]);
    }
}
