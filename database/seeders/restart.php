<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class restart extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 50; $i++) {
            $user = DB::table('users')->insertGetId([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $faker->unique()->email,
                'password' => bcrypt('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $profileUser = DB::table('users')->find($user); // Retrieve the user from the database to get the ID

            $finalDirectory = public_path('user_media/' . $profileUser->id . '/profile_picture');
            if (!is_dir($finalDirectory)) {
                mkdir($finalDirectory, 0755, true);
            }

            $file = $faker->image($finalDirectory, 400, 300, 'people', false);
            $fileName = pathinfo($file, PATHINFO_FILENAME) . '.' . pathinfo($file, PATHINFO_EXTENSION);

            DB::table('users_information')->insert([
                'user_id' => $user,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'date_of_birth' => $faker->date(),
                'phone_number' => $faker->phoneNumber,
                'city' => $faker->city,
                'country' => "US",
                'address' => $faker->address,
                'profile_picture' => $fileName, // Store the image file name in the database
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('death_confirmations')->insert([
                'user_id' => $user,
                'is_alive' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('death_confirmations')->insert([
                'user_id' => $user,
                'is_alive' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        for($a = 1; $a < 6; $a++)
        {
            DB::table('trusted_contacts')->insert([
                'user_id' => 1,
                'trusted_contact_id' => $a + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('trusted_contacts')->insert([
                'user_id' => 2,
                'trusted_contact_id' => $a + 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if($a < 3){
                DB::table('trusted_contacts')->insert([
                    'user_id' => 3,
                    'trusted_contact_id' => $a + 5,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
        DB::table('users')->insert([
            'first_name' => 'Saqib',
            'last_name' => 'Kamran',
            'email' => 'email@saqibkamran.com',
            'password' => bcrypt('12341234'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users_information')->insert([
            'user_id' => 51,
            'gender' => 'male',
            'date_of_birth' => $faker->date(),
            'phone_number' => $faker->phoneNumber,
            'city' => $faker->city,
            'country' => "US",
            'address' => $faker->address,
            'profile_picture' => $faker->imageUrl(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('death_confirmations')->insert([
            'user_id' => 51,
            'is_alive' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('staff_members')->insert([
            'user_id' => 51,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        $this->call(RelationshipSeeder::class);
        $this->call(Countries::class);
    }
}
