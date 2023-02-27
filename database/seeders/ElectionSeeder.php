<?php

namespace Database\Seeders;

use App\Models\Election;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ElectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $elections = [
            [
                'name'  => 'Presidential',
            ]
        ];

        foreach ($elections as $election) {
            Election::firstOrCreate($election);
        }
    }
}
