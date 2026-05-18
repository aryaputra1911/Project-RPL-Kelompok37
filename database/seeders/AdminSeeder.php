<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@peakrent.com'],
            [
                'nama'     => 'Admin PeakRent',
                'email'    => 'admin@peakrent.com',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
