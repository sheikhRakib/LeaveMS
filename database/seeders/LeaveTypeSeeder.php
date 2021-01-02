<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LeaveType::create([
            'type' => 'annual',
            'days' => 5,
        ]);
        LeaveType::create([
            'type' => 'personal',
            'days' => 5,
        ]);
        LeaveType::create([
            'type' => 'without pay',
            'days' => 5,
        ]);
        LeaveType::create([
            'type' => 'long service',
            'days' => 5,
        ]);
    }
}
