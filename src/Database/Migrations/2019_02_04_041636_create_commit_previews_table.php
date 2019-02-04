<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommitPreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $config = config('luba.database');
        Schema::create($config['prefix'] . 'commit_previews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('commit_id');
            $table->string('url');
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
        Schema::dropIfExists($config['prefix'] . 'commit_previews');
    }
}
