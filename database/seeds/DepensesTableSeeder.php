<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepensesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('depenses')->insert([
                [
                'name' => "Revenus"
            ], [
                'name' => "Dépenses Fixes"
            ], [
                'name' => "Dépenses Variables"
            ], [
                'name' => "Dépenses Occasionnelles"
            ]
        ]);
    }

}