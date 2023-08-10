<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->integer('view_role')->default(0)->nullable();
            $table->integer('create_role')->default(0)->nullable();
            $table->integer('edit_role')->default(0)->nullable();
            $table->integer('delete_role')->default(0)->nullable();
            $table->integer('view_product')->default(0)->nullable();
            $table->integer('create_product')->default(0)->nullable();
            $table->integer('edit_product')->default(0)->nullable();
            $table->integer('delete_product')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
