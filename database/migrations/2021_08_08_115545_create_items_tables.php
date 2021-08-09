<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribution_modes', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('items', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('distribution_mode_id');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('distribution_mode_id')->references('id')->on('distribution_modes')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::create('item_product', function(Blueprint $table){
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('product_id');

            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('services', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('units', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('symbol');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('item_unit', function(Blueprint $table){
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('unit_id');

            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('service_unit', function(Blueprint $table){
            $table->unsignedBigInteger('service_id');
            $table->unsignedBigInteger('unit_id');

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade')->onUpdate('cascade');
        });
        
        Schema::create('locations', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('item_service', function(Blueprint $table){
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('service_id');

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
        });
        
        Schema::create('item_ties', function(Blueprint $table){
            $table->unsignedBigInteger('i_item_id');
            $table->unsignedBigInteger('d_item_id');

            $table->foreign('i_item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('d_item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('currencies', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('symbol');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('item_costs', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('item_id');
            $table->double('amount');
            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('location_id');
            $table->dateTime('effective_date')->nullable();
            $table->dateTime('expiry_date')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');

        });
        
        Schema::create('service_costs', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('service_id');
            $table->double('amount');
            $table->unsignedBigInteger('currency_id');
            $table->unsignedBigInteger('location_id');
            $table->dateTime('effective_date')->nullable();
            $table->dateTime('expiry_date')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_costs');
        Schema::dropIfExists('item_costs');
        Schema::dropIfExists('currencies');
        Schema::dropIfExists('item_ties');
        Schema::dropIfExists('item_service');
        Schema::dropIfExists('locations');
        Schema::dropIfExists('service_unit');
        Schema::dropIfExists('item_unit');
        Schema::dropIfExists('units');
        Schema::dropIfExists('services');
        Schema::dropIfExists('item_product');
        Schema::dropIfExists('items');
        Schema::dropIfExists('distribution_modes');
    }
}
