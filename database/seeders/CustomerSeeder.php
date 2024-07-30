<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'nhan',
            'email' => 'nhan@gmail.com',
            'phone' => '0342078433',

            'address' => 'Can tho',
            'object' => 'Khach hang',
            'status' => true
        ]);
    }
}
