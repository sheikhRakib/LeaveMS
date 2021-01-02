<?php

namespace Database\Seeders;

use App\Models\MaxLeaveInfo;
use Illuminate\Database\Seeder;

class MaxLeaveInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MaxLeaveInfo::create([
            'leave_type' => 'annual',
            'days'       => 5,
        ]);
        MaxLeaveInfo::create([
            'leave_type' => 'personal',
            'days'       => 5,
        ]);
        MaxLeaveInfo::create([
            'leave_type' => 'without pay',
            'days'       => 5,
        ]);
        MaxLeaveInfo::create([
            'leave_type' => 'long service',
            'days'       => 5,
        ]);
    }
}
