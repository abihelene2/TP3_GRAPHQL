<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path(). '/seeders/data_source.json');
        $data = json_decode($json, true);

        

        foreach ($data['data'] as $film) {
            foreach ($film['reviews'] as $review) {
                DB::table('reviews')->insert([
                    'film_id' => $film['id'],
                    'source' => $review['source'],
                    'score' => $review['score'],
                    'votes' => $review['votes']
                ]);
            }
        }
    }       
}
