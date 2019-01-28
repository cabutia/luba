<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $config = config('luba.database');
        Schema::create($config['prefix'] . 'projects', function (Blueprint $table) use ($config) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('path')->nullable();
            $table->string('image')->nullable();
            $table->boolean('public')->default(false);
            $table->timestamp('last_sync')->nullable();
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
        $config = config('luba.database');
        Schema::dropIfExists($config['prefix'] . 'projects');
    }
}
