<?php

namespace Database\Seeders;

use App\Models\Party;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parties = [
            [
                'name'  => 'Accord',
                'code'  => 'A'
            ],
            [
                'name'  => 'Action Alliance',
                'code'  => 'AA'
            ],
            [
                'name'  => 'Action Democratic Party',
                'code'  => 'ADP'
            ],
            [
                'name'  => 'Action Peoples Party',
                'code'  => 'APP'
            ],
            [
                'name'  => 'African Action Congress',
                'code'  => 'AAC'
            ],
            [
                'name'  => 'African Democratic Congress',
                'code'  => 'ADC'
            ],
            [
                'name'  => 'All Progressives Congress',
                'code'  => 'APC'
            ],
            [
                'name'  => 'All Progressives Grand Alliance',
                'code'  => 'APGA'
            ],
            [
                'name'  => 'Allied Peoples Movement',
                'code'  => 'APM'
            ],
            [
                'name'  => 'Boot Party',
                'code'  => 'BP'
            ],
            [
                'name'  => 'Labour Party',
                'code'  => 'LP'
            ],
            [
                'name'  => 'National Rescue Movement',
                'code'  => 'NRM'
            ],
            [
                'name'  => 'New Nigeria Peoples Party',
                'code'  => 'NNPP'
            ],
            [
                'name'  => 'Peoples Democratic Party',
                'code'  => 'PDP'
            ],
            [
                'name'  => 'Peoples Redemption Party',
                'code'  => 'PRP'
            ],
            [
                'name'  => 'Social Democratic Party',
                'code'  => 'SDP'
            ],
            [
                'name'  => 'Young Progressive Party',
                'code'  => 'YPP'
            ],
            [
                'name'  => 'Zenith Labour Party',
                'code'  => 'ZLP'
            ]
        ];

        foreach ($parties as $party) {
            Party::firstOrCreate(Arr::only($party, ['name']), $party);
        }
    }
}
