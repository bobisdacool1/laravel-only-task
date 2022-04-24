<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_role', function (Blueprint $table) {
            $table->foreignId('news_id')->references('id')->on('news')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('role_code')->foreign('role_code')->references('code')->on('roles')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_role');
    }
}
