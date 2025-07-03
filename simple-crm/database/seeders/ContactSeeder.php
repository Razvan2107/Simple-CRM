<?php

namespace Database\Seeders;

use App\Models\Contact;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ro_RO');

        $statuses = ['new', 'in_progress', 'closed'];
        $tags = ['new_lead', 'inactive_client', 'high_value', 'vip', 'potential_buyer', 'event_attendee', 'referral_source'];

        foreach(range(1, 30) as $index) {
            $fullName = $faker->name();
            $email = strtolower(str_replace(' ', '.', $fullName)) . '@example.com';

            Contact::create([
                'name' => $fullName,
                'email' => $email,
                'company' => $faker->company(),
                'deal_status' => $faker->randomElement($statuses),
                'tag' => $faker->randomElement($tags),
            ]);
        }
    }
}
