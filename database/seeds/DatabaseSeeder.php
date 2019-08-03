<?php

use Illuminate\Database\Seeder;
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

        DB::table('categories')->insert(['categorie'=>'Categorie1']);
        DB::table('categories')->insert(['categorie'=>'Categorie2']);
        DB::table('categories')->insert(['categorie'=>'Categorie3']);
    }
}
