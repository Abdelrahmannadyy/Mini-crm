<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Getting all companies
        $companies = Company::all();

        // Generate 20 employee records
        for ($i = 0; $i < 20; $i++) {
            // Get a random company
            $company = $companies->random();

            Employee::create([
                'firstname' => 'EmployeeFirstName' . ($i + 1),
                'lastname' => 'EmployeeLastName' . ($i + 1),
                'email' => 'employee' . ($i + 1) . '@example.com',
                'phonenumber' => '123456789' . $i,
                'company_id' => $company->id,
            ]);
        }
    }
}
