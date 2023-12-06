<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Relationship;

class RelationshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relationships = [
            'Brother',
            'Sister',
            'Mother',
            'Father',
            'Wife',
            'Husband',
            'Daughter',
            'Son',
            'Grandmother',
            'Grandfather',
            'Granddaughter',
            'Grandson',
            'Aunt',
            'Uncle',
            'Niece',
            'Nephew',
            'Cousin',
            'Sister in Law',
            'Brother in Law',
            'Mother in Law',
            'Father in Law',
            'Daughter in Law',
            'Son in Law',
            'Stepmother',
            'Stepfather',
            'Stepdaughter',
            'Stepson',
            'Stepsister',
            'Stepbrother',
            'Grandmother in Law',
            'Grandfather in Law',
        ];


        foreach ($relationships as $relationship) {
            Relationship::create([
                'type' => $relationship,
            ]);
        }
    }
}
