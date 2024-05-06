<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Generate 20 company records
        for ($i = 0; $i < 20; $i++) {
            Company::create([
                'name' => 'Company ' . ($i + 1),
                'email' => 'company' . ($i + 1) . '@example.com',
                'logo' => null, // Replace with your logic for generating logos
                'website' => 'https://www.example.com/company' . ($i + 1),
            ]);
        }
    }
}
