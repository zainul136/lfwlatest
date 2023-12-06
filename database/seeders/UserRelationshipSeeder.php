<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserRelationshipSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Define the relationships and their inverse relationships
        $relationshipsData = [
            'Brother' => [
                'Male' => 'Brother',
                'Female' => 'Sister',
            ],
            'Sister' => [
                'Male' => 'Brother',
                'Female' => 'Sister',
            ],
            'Father' => [
                'Male' => 'Son',
                'Female' => 'Daughter',
            ],
            'Mother' => [
                'Male' => 'Son',
                'Female' => 'Daughter',
            ],
            'Son' => [
                'Male' => 'Father',
                'Female' => 'Mother',
            ],
            'Daughter' => [
                'Male' => 'Father',
                'Female' => 'Mother',
            ],
            'Grandfather' => [
                'Male' => 'Grandson',
                'Female' => 'Granddaughter',
            ],
            'Grandmother' => [
                'Male' => 'Grandson',
                'Female' => 'Granddaughter',
            ],
            'Grandson' => [
                'Male' => 'Grandfather',
                'Female' => 'Grandmother',
            ],
            'Granddaughter' => [
                'Male' => 'Grandfather',
                'Female' => 'Grandmother',
            ],
            'Uncle' => [
                'Male' => 'Nephew',
                'Female' => 'Niece',
            ],
            'Aunt' => [
                'Male' => 'Nephew',
                'Female' => 'Niece',
            ],
            'Nephew' => [
                'Male' => 'Uncle',
                'Female' => 'Aunt',
            ],
            'Niece' => [
                'Male' => 'Uncle',
                'Female' => 'Aunt',
            ],
            'Cousin' => [
                'Male' => 'Cousin',
                'Female' => 'Cousin',
            ],
            'BrotherInLaw' => [
                'Male' => 'BrotherInLaw',
                'Female' => 'SisterInLaw',
            ],
            'SisterInLaw' => [
                'Male' => 'BrotherInLaw',
                'Female' => 'SisterInLaw',
            ],
            'FatherInLaw' => [
                'Male' => 'SonInLaw',
                'Female' => 'DaughterInLaw',
            ],
            'MotherInLaw' => [
                'Male' => 'SonInLaw',
                'Female' => 'DaughterInLaw',
            ],
            'SonInLaw' => [
                'Male' => 'FatherInLaw',
                'Female' => 'MotherInLaw',
            ],
            'DaughterInLaw' => [
                'Male' => 'FatherInLaw',
                'Female' => 'MotherInLaw',
            ],
            'Husband' => [
                'Female' => 'Wife',
            ],
            'Wife' => [
                'Male' => 'Husband',
            ],
            'CloseFriend' => [
                'Male' => 'CloseFriend',
                'Female' => 'CloseFriend',
            ],
        ];        

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
        function getRelationshipId($relationshipName) {
            global $relationships;
        
            $relationshipId = array_search($relationshipName, $relationships);
        
            if ($relationshipId !== false) {
                return $relationshipId;
            }
        
            return null; // Return null if relationship name is not found
        }

        // Define the number of random relationships to add for each user
        $minRelationships = 10;
        $maxRelationships = 15;

        // Define the number of trusted contacts to add for each user
        $trustedContactsCount = 5;

        // Get all user IDs
        $userIds = DB::table('users')->pluck('id');

        foreach ($userIds as $userId) {
            $userGender = DB::table('users_information')
                ->where('user_id', $userId)
                ->value('gender');

            // Initialize an array to store trusted contacts
            $trustedContacts = [];

            // Iterate to add relationships and their inverses
            foreach ($relationshipsData as $relationship => $inverseRelationships) {
                // Determine the inverse relationship based on user's gender
                $inverseRelationship = $inverseRelationships[$userGender];

                // Map the relationship names to their corresponding IDs
                $relationshipId = $this->getRelationshipIdByName($relationship);
                $inverseRelationshipId = $this->getRelationshipIdByName($inverseRelationship);

                if ($relationshipId !== null && $inverseRelationshipId !== null) {
                    // Insert relationships for the user
                    DB::table('user_relationships')->insert([
                        'user_id' => $userId,
                        'relative_id' => $userId, // Replace with the actual relative's user ID
                        'relationship_id' => $relationshipId,
                        'status' => 'Approved',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

                    // Insert inverse relationships for the user
                    if ($relationshipId !== $inverseRelationshipId) {
                        DB::table('user_relationships')->insert([
                            'user_id' => $userId,
                            'relative_id' => $userId,
                            'relationship_id' => $inverseRelationshipId,
                            'status' => 'Approved',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }

                    // Store the relationship and its inverse as trusted contacts
                    $trustedContacts[] = $relationshipId;
                    $trustedContacts[] = $inverseRelationshipId;
                }
            }

            // Shuffle the trusted contacts and select the first 5
            shuffle($trustedContacts);
            $selectedTrustedContacts = array_slice($trustedContacts, 0, $trustedContactsCount);

            // Add trusted contacts to the database
            foreach ($selectedTrustedContacts as $contact) {
                DB::table('trusted_contacts')->insert([
                    'user_id' => $userId,
                    'trusted_contact_id' => $userId, // Replace with the actual trusted contact's user ID
                    'relationship_id' => $contact,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        
    }
    private function getRelationshipIdByName($relationshipName)
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

        $key = array_search($relationshipName, $relationships);

        return $key !== false ? $key : null;
    }
}
