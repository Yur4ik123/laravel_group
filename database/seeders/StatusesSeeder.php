<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusesSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['pending', 'confirmed', 'canceled'];
        foreach ($statuses as $s) {
            Status::firstOrCreate(['name' => $s]);
        }
    }
}
