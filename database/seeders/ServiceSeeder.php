<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['name' => 'Signature Gentleman Cut', 'price' => 35000],
            ['name' => 'Executive Wash & Grooming', 'price' => 50000],
            ['name' => 'The Royal Shave (Hot Towel)', 'price' => 25000],
            ['name' => 'Junior Gentleman (Kids Cut)', 'price' => 30000],
            ['name' => 'Black Hair Retouch (Natural)', 'price' => 60000],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['name' => $service['name']], $service);
        }
    }
}