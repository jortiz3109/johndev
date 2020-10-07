<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id');
            $table->ipAddress('ip_address')->nullable();
            $table->string('browser', 80)->nullable();
            $table->string('browser_family', 20)->nullable();
            $table->unsignedTinyInteger('browser_mayor')->nullable();
            $table->string('browser_version', 30)->nullable();
            $table->string('os', 80)->nullable();
            $table->string('os_family', 20)->nullable();
            $table->unsignedTinyInteger('os_mayor')->nullable();
            $table->string('os_version', 30)->nullable();
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
        Schema::dropIfExists('post_visits');
    }
}
