<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert([
            'question' => "Why no eggs though?",
        ]);

        DB::table('questions')->insert([
            'question' => "Do you eat fish?",
        ]);

        DB::table('questions')->insert([
            'question' => "Where do you get your protein?",
        ]);

        DB::table('questions')->insert([
            'question' => "Seriously, though. If you were stranded on a desert island with a pig, would you eat it?",
        ]);

        DB::table('questions')->insert([
            'question' => "If you were stranded on a dessert island, and none of the desserts were vegan, would you eat them?",
        ]);
    }
}
