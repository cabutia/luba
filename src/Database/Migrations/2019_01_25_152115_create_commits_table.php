<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $config = config('luba.database');
        Schema::create($config['prefix'] . 'commits', function (Blueprint $table) use ($config) {
            $table->increments('id');
            $table->string('hash');
            $table->string('author')->nullable();
            $table->timestamp('date')->nullable();
            $table->string('description')->nullable();
            $table->string('comments')->nullable();
            $table->unsignedInteger('project_id');

            $table
                ->foreign('project_id')
                ->references('id')
                ->on($config['prefix'] . 'projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commits');
    }
}
