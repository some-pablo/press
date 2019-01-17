<?php

use Illuminate\Database\Seeder;

class PublisherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $publishers = [
            'A&A Books',
            'B&C Books',
            'C Books',
            'D Books',
            'E&Z Books',
            'F Books',
            'G Books',
            'H Books',
            'I Books',
        ];

        foreach ($publishers as $publisher) {
            DB::table('publishers')->insert([
                'name' => $publisher,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
