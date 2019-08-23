<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateClientReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('client_reviews', function (Blueprint $table) {
            $table->string('phone');
            $table->string('email');
            $table->string('address')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('client_reviews', function (Blueprint $table) {
            $table->string('phone');
            $table->string('email');
            $table->string('address')->nullable();
           
        });
    }
}
