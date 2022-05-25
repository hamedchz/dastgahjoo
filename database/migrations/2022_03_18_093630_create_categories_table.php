<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedBigInteger('parent')->default(0)->nullable();
            $table->string('description')->nullable();
            $table->string('metaTitle','60')->nullable();
            $table->string('metaDescription','160')->nullable();
            $table->string('slug');
            $table->boolean('isActive')->default(1)->nullable();
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
        Schema::dropIfExists('categories');

    }
}
