<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPasswordToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->default('$2y$10$cg17YNqPkW9I7PhxLqn3oO2PkmaoJGPaK2CKfQhA3ZvTG26hTqGkm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('password')->default('$2y$10$cg17YNqPkW9I7PhxLqn3oO2PkmaoJGPaK2CKfQhA3ZvTG26hTqGkm');
        });
    }
}
