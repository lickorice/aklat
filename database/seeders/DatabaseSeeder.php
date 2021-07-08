<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create default admin user
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin".'@test.com',
            'password' => Hash::make('asdasdasd'),
        ]);
        // Create books
        $books_data = [
            ["id" => 1, "title" => "Computer Networking", "subtitle" => "A Top-Down Approach", "edition" => "7th Edition", "isbn" => "0135928796, 9780135928790", "year" => "2020"],
            ["id" => 2, "title" => "Modern Operating Systems", "subtitle" => null, "edition" => null, "isbn" => "0136006639, 9780136006633", "year" => "2008"],
        ];
        DB::table('books')->insert($books_data);

        include("kurosechapters.php");
        include("tanenbaumchapters.php");

        DB::table('chapters')->insert($kurose_chapters);
        DB::table('chapters')->insert($tanenbaum_chapters);
    }
}
