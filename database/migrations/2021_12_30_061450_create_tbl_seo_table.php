<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_seo', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('keywords');
            $table->string('Robots1');
            $table->string('Robots2');
            $table->string('googlebot');
            $table->string('Robots3');
            $table->string('revisit-after');
            $table->string('author');
            $table->string('subject');
            $table->string('url');
            $table->string('identifier-URL');
            $table->string('msnbot');
            $table->string('Slurp');
            $table->string('directory');
            $table->string('language');
            $table->string('distribution');
            $table->string('coverage');
            $table->string('copyright');
            $table->string('rating');
            $table->string('classification');
            $table->string('canonical');
            $table->string('page_id');

            $table->foreign('page_id')->references('id')->on('pages'); 
            $table->string('is_deleted');
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
        Schema::dropIfExists('tbl_seo');
    }
}
