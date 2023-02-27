<?php

namespace Database\Seeders;

use App\Models\Election;
use App\Models\Party;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $candidates = [
            [
                'name'  => 'Peter Obi',
                'party' => 'LP',
                'election'  => 'Presidential'
            ],
            [
                'name'  => 'Atiku Abubakar',
                'party' => 'PDP',
                'election'  => 'Presidential'
            ],
            [
                'name'  => 'Bola Tinubu',
                'party' => 'APC',
                'election'  => 'Presidential'
            ],
        ];

        foreach ($candidates as $candidate) {
            $party = Party::where('name', $candidate['party'])
                ->orWhere('code', $candidate['party'])
                ->orWhere('slug', $candidate['party'])
                ->first();

            $election = Election::where('name', $candidate['election'])
                ->orWhere('slug', $candidate['election'])
                ->first();

            if ($election) {

                $election->candidates()->firstOrCreate([
                    'name'      => $candidate['name'],
                    'party_id'  => $party->id ?? null,
                ]);
            }
        }
    }
}
