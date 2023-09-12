<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++) {
            DB::table('subjects')->insert([
                'name' => fake()->word(),
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
