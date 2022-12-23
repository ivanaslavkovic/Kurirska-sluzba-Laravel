<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NoviNazivBrojTelefona extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('korisniks', function (Blueprint $table) {
            $table->renameColumn('brojTelefona', 'broj_telefona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('korisniks', function (Blueprint $table) {
            $table->renameColumn('broj_telefona', 'brojTelefona');
        });
    }
}
