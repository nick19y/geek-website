<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::firstOrNew(['email' => env('ADMIN_EMAIL', 'admin@gmail.com')]);
        $admin->forceFill([
            'name' => 'Admin',
            'email_verified_at' => now(),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'is_admin' => true,
        ])->save();
    }
}
