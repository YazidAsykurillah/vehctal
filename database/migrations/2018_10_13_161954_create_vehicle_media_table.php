<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id');
            $table->string('file_name');
            $table->boolean('is_primary')->default(FALSE);
            $table->boolean('is_allowed')->default(TRUE)->comment('State if this media is allowed to be displayed or not');
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
        Schema::dropIfExists('vehicle_media');
    }
}
