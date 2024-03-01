<?php

namespace Database\Seeders;

use App\Models\account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class accountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        account::create(
            [
                'title' => 'Cash',
                'type' => 'Business',
                'Category' => 'Cash',
            ]
        );

        account::create(
            [
                'title' => 'Walk-in Customer',
                'type' => 'Customer',
            ]
        );

        account::create(
            [
                'title' => 'Walk-in Vendor',
                'type' => 'Vendor',
            ]
        );
    }
}
