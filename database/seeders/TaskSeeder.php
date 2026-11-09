<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $companies = Company::all();

        // se utilizo una funcion para lograr que cada registro fuera diferente.

        Task::factory()->count(50)->create([
            'user_id' => function () use ($users) {
                return $users->random()->id;
            },

            'company_id' => function () use ($companies) {
                return $companies->random()->id;
            },
        ]);
    }
    
}
