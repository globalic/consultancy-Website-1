<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebsiteContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('email');
            $table->string('phone');
            $table->string('logo');
            $table->string('header_image');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('youtube');
            $table->string('google_plus');
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
        Schema::dropIfExists('website_contents');
    }
}
