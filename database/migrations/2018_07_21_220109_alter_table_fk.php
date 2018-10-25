<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableFk extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('comptes', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('mouvements', function (Blueprint $table) {
            $table->foreign('compte_id')->references('id')->on('comptes');
        });

        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('mouvement_id')->references('id')->on('mouvements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
