<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // register admin in the database for authentificate private
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        $this->call([
            SurveyTableSeeder::class,
            QuestionTableSeeder::class,
            CustomerTableSeeder::class,
            AnswerTableSeeder::class
        ]);
    }
}
