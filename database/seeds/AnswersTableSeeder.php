<?php

use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('answers')->insert([
            'question_id' => 1,
            'answer' => "Have you seen where eggs come from?",
        ]);

        DB::table('answers')->insert([
            'question_id' => 1,
            'answer' => "*sigh*",
        ]);

        DB::table('answers')->insert([
            'question_id' => 2,
            'answer' => "No.",
        ]);

        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => "Nuts, seeds, legumes, wholegrains.",
        ]);

        DB::table('answers')->insert([
            'question_id' => 3,
            'answer' => "You... don't want to know.",
        ]);

        DB::table('answers')->insert([
            'question_id' => 4,
            'answer' => "No.",
        ]);

        DB::table('answers')->insert([
            'question_id' => 5,
            'answer' => "Only if they're consenting desserts.",
        ]);
    }
}
