<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMouvements extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('mouvements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->enum('type', ['depenses_fixes', 'depenses_variables', 'depenses_occasionnelles', 'revenus']);
            $table->integer('compte_id')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('mouvements');
    }

}
