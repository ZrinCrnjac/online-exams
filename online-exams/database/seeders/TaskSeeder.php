<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i < 10; $i++) {
            DB::table('tasks')->insert([
                'name' => fake()->word(),
                'text' => fake()->text(),
                'subject_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for($i = 0; $i < 10; $i++) {
            DB::table('tasks')->insert([
                'name' => fake()->word(),
                'text' => fake()->text(),
                'subject_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for($i = 0; $i < 10; $i++) {
            DB::table('tasks')->insert([
                'name' => fake()->word(),
                'text' => fake()->text(),
                'subject_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for($i = 0; $i < 10; $i++) {
            DB::table('tasks')->insert([
                'name' => fake()->word(),
                'text' => fake()->text(),
                'subject_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
