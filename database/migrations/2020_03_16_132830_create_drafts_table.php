<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDraftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drafts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('website_id');
            
            $table->string('name');
            $table->text('content');

            $table->timestamps();

            $table->index('id');
            $table->unique('id');
            $table->foreign('website_id')->references('id')->on('websites')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('drafts');
    }
}
