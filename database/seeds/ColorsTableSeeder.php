<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('colors')->insert([
                [
                'name' => "Bleu",
                'color_theme' => "blue",
                'color_item' => "blue"
            ], [
                'name' => "Jaune",
                'color_theme' => "yellow",
                'color_item' => "orange"
            ], [
                'name' => "Vert",
                'color_theme' => "green",
                'color_item' => "olive"
            ], [
                'name' => "Violet",
                'color_theme' => "purple",
                'color_item' => "purple"
            ], [
                'name' => "Rouge",
                'color_theme' => "red",
                'color_item' => "maroon"
            ], [
                'name' => "Noir",
                'color_theme' => "black",
                'color_item' => "navy"
            ]
        ]);
    }

}
