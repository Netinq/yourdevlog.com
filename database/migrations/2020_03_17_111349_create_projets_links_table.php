<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsLinksTable extends Migration
{
    public function up()
    {
        Schema::create('projets_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->string('students');
            $table->index('id');
            $table->unique('id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('projets_links');
    }
}
