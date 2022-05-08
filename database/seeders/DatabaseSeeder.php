<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        Book::create([
            'title'=> 'All My Rage'
        ]);


        Book::create([
            'title'=> 'The Way of Kings'
        ]);

        Book::create([
            'title'=> 'Jade Fire Gold'
        ]);

        \App\Models\User::factory(10)->create();
    }
}
