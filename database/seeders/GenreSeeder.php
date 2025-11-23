<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run()
{
    $genres = ['Fiction', 'Romance', 'Horror', 'Sci-Fi', 'Drama', 'Education'];

    foreach ($genres as $g) {
        \App\Models\Genre::create(['name' => $g]);
    }
}

}
