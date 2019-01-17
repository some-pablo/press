<?php

use Illuminate\Database\Seeder;

class MagazineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('magazines')->insert([
            'name' => 'MyMagazine',
            'publisher_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        factory(\App\Models\Magazine::class, 200)->create();
    }
}
