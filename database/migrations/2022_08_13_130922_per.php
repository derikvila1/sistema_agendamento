<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::connection('liceu')->create('permitted_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user')->unsigned();
            $table->foreign('user')->references('id')->on('users');
            $table->bigInteger('permission')->unsigned();
            $table->foreign('permission')->references('id')->on('permissions');
            $table->timestamp('granted_date');
            $table->bigInteger('granted_by')->unsigned();
            $table->foreign('granted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permitted_users');
    }
};
