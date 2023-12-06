<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelationshipsSeeder extends Seeder
{
    public function run()
    {
        // Define the relationship types and their inverse relationships
        $relationshipTypes = [
            'Brother' => [
                'Male' => 'Brother',
                'Female' => 'Sister',
            ],
            'Sister' => [
                'Male' => 'Brother',
                'Female' => 'Sister'
            ],
            'Father' => [
                'Male' => 'Son',
                'Female' => 'Daughter'
            ],
            'Mother' => [
                'Male' => 'Son',
                'Female' => 'Daughter'
            ],
            'Son' => [
                'Male' => 'Father',
                'Female' => 'Mother'
            ],
            'Daughter' => [
                'Male' => 'Father',
                'Female' => 'Mother'
            ],
            'Grandfather' => [
                'Male' => 'Grandson',
                'Female' => 'Granddaughter'
            ],
            'Grandmother' => [
                'Male' => 'Grandson',
                'Female' => 'Granddaughter'
            ],
            'Grandson' => [
                'Male' => 'Grandfather',
                'Female' => 'Grandmother'
            ],
            'Granddaughter' => [
                'Male' => 'Grandfather',
                'Female' => 'Grandmother'
            ],
            'Uncle' => [
                'Male' => 'Nephew',
                'Female' => 'Niece'
            ],
            'Aunt' => [
                'Male' => 'Nephew',
                'Female' => 'Niece'
            ],
            'Nephew' => [
                'Male' => 'Uncle',
                'Female' => 'Aunt'
            ],
            'Niece' => [
                'Male' => 'Uncle',
                'Female' => 'Aunt'
            ],
            'Cousin' => [
                'Male' => 'Cousin',
                'Female' => 'Cousin'
            ],
            'BrotherInLaw' => [
                'Male' => 'BrotherInLaw',
                'Female' => 'SisterInLaw'
            ],
            'SisterInLaw' => [
                'Male' => 'BrotherInLaw',
                'Female' => 'SisterInLaw'
            ],
            'FatherInLaw' => [
                'Male' => 'SonInLaw',
                'Female' => 'DaughterInLaw'
            ],
            'MotherInLaw' => [
                'Male' => 'SonInLaw',
                'Female' => 'DaughterInLaw'
            ],
            'SonInLaw' => [
                'Male' => 'FatherInLaw',
                'Female' => 'MotherInLaw'
            ],
            'DaughterInLaw' => [
                'Male' => 'FatherInLaw',
                'Female' => 'MotherInLaw'
            ],
            'Husband' => [
                'Female' => 'Wife'
            ],
            'Wife' => [
                'Male' => 'Husband'
            ],

            'CloseFriend' => [
                'Male' => 'CloseFriend',
                'Female' => 'CloseFriend'
            ]
            
        ];

        // Create a map to store the relationship IDs
        $relationshipIds = [];

        // Loop through the relationship types and assign IDs
        foreach ($relationshipTypes as $relation => $inverseRelations) {
            foreach ($inverseRelations as $gender => $inverseRelation) {
                // Generate a unique ID for each combination of relation and gender
                $relationshipId = "{$relation}-{$gender}";
                $relationshipIds[$relationshipId] = [
                    'name' => $relation,
                    'gender' => $gender,
                    'inverse_name' => $inverseRelation,
                ];
            }
        }

        // Populate the 'relationships' table with the relationship data and IDs
        foreach ($relationshipIds as $relationshipId => $data) {
            DB::table('relationships')->insert([
                'name' => $data['name'],
                'gender' => $data['gender'],
                'inverse_name' => $data['inverse_name'],
            ]);
        }
    }
}
