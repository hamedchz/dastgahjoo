<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('price');
            $table->string('label')->nullable();
            $table->integer('products');
            $table->string('duration');
            $table->integer('images');
            $table->boolean('logo');
            $table->integer('banner');
            $table->integer('video');
            $table->boolean('site');
            $table->integer('file');
            $table->boolean('isActive')->default(1)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

      

        Schema::create('history_packages', function (Blueprint $table){

            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->integer('price');
            $table->string('startDate');
            $table->string('endDate');
            $table->integer('afterPrice');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('vendors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('phone')->nullable();
            $table->integer('mobile')->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('province_id');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->boolean('isApproved')->default(1)->nullable();
            $table->unsignedBigInteger('package_id');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->string('slug');
            $table->integer('fax')->nullable();
            $table->string('contactPerson')->nullable();
            $table->float('lat')->nullable();
            $table->float('long')->nullable();
            $table->string('identityNumber');
            $table->softDeletes();
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
        Schema::dropIfExists('vendors');
        Schema::dropIfExists('packages');
        Schema::dropIfExists('history_packages');

    }
}
