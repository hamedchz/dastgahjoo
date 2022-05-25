<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('itemNo');
            $table->integer('quantity');
            $table->string('year_of_manufacture');
            $table->integer('price');
            $table->string('manufacturer');
            $table->string('model');
            $table->string('type_of_machine');
            $table->string('description');
            $table->boolean('isStock')->default(1)->nullable();
            $table->string('location')->nullable();
            $table->string('metaTitle','60')->nullable();
            $table->string('metaDescription','160')->nullable();
            $table->boolean('isInstallments')->default(0)->nullable();
            $table->boolean('isSold')->default(0)->nullable();
            $table->string('slug');
            $table->integer('view')->default(0)->nullable();
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->enum('status',['pending','verified','rejected']);//0=>pending|1=>verified|2=>rejected
            $table->softDeletes();
            $table->timestamps();

        });

        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('image');
            $table->string('type');
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
        Schema::dropIfExists('attachments');
        Schema::dropIfExists('products');

    }
}
