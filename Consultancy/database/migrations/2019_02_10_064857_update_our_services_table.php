<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOurServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('our_services', function (Blueprint $table) {
            $table->longtext('short_description');
            $table->string('icon');
        });
            
      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('our_services', function (Blueprint $table) {
            $table->longtext('short_description');
            $table->string('icon');
        });
    }
}
