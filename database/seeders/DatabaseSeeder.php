<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create an admin user if it doesn't already exist.
        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('AdminPass123!'),
            ]
        );

        // Create categories if they don't exist
        $categories = [
            ['name' => 'Processors'],
            ['name' => 'Graphics Cards'],
            ['name' => 'Memory & Storage'],
            ['name' => 'Motherboards'],
            ['name' => 'Power Supplies'],
            ['name' => 'Cooling'],
            ['name' => 'Cases'],
            ['name' => 'Peripherals'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['name' => $category['name']],
                [
                    'slug' => Str::slug($category['name']),
                ]
            );
        }

        // Create brands if they don't exist
        $brands = [
            ['name' => 'Intel'],
            ['name' => 'AMD'],
            ['name' => 'NVIDIA'],
            ['name' => 'ASUS'],
            ['name' => 'Corsair'],
            ['name' => 'Kingston'],
            ['name' => 'Samsung'],
            ['name' => 'MSI'],
        ];

        foreach ($brands as $brand) {
            Brand::firstOrCreate(
                ['name' => $brand['name']],
                [
                    'slug' => Str::slug($brand['name']),
                ]
            );
        }
    }
}
