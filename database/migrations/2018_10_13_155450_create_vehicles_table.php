<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('vehicle_type_id');
            $table->integer('brand_id')->nullable()->default(NULL);
            $table->text('description');
            $table->integer('province_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->text('address')->nullable();
            $table->boolean('is_displayed')->default(TRUE)->comment('Can be set by the user to displayed or not');
            $table->enum('status',['waiting_for_moderation', 'moderated'])->default('waiting_for_moderation');
            $table->boolean('premium')->default(FALSE);
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
        Schema::dropIfExists('vehicles');
    }
}
