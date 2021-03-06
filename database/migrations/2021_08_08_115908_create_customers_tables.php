<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_types', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('pays');
            $table->boolean('external_publisher_document');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('customer_type_id');
            $table->string('number');
            $table->boolean('communication');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('customer_type_id')->references('id')->on('customer_types')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('account_customer', function(Blueprint $table){
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('customer_id');
            
            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('organisation_customer', function(Blueprint $table){
            $table->unsignedBigInteger('organisation_id');
            $table->unsignedBigInteger('customer_id');
            
            $table->foreign('organisation_id')->references('id')->on('organisations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('group_customer', function(Blueprint $table){
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('customer_id');
            
            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');

        });
        
        Schema::create('subscription_periods', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('number');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->integer('order');
            $table->string('description')->nullable();
            $table->boolean('status');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('item_period', function(Blueprint $table){
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('period_id');
            
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('period_id')->references('id')->on('subscription_periods')->onUpdate('cascade')->onDelete('cascade');

        });
        
        Schema::create('subscription_status', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('medium', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('media_medium', function(Blueprint $table){
            $table->unsignedBigInteger('media_id');
            $table->unsignedBigInteger('medium_id');
            
            $table->foreign('media_id')->references('id')->on('media')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('medium_id')->references('id')->on('medium')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('item_media', function(Blueprint $table){
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('media_id');
            
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media')->onUpdate('cascade')->onDelete('cascade');
            
        });

        Schema::create('customer_item_subscription', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('item_id');
            $table->dateTime('date');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
            
            
        });

        Schema::create('customer_subscription_period', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('customer_item_sub_id');
            $table->unsignedBigInteger('subscription_period_id');
            $table->unsignedBigInteger('location_id');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('customer_item_sub_id')->references('id')->on('customer_item_subscription')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subscription_period_id')->references('id')->on('subscription_periods')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate('cascade')->onDelete('cascade');
            
            
        });
        
        Schema::create('subscription_quantities', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('customer_item_sub_id');
            $table->integer('amount');
            $table->unsignedBigInteger('unit_id');
            $table->unsignedBigInteger('media_id');
            $table->unsignedBigInteger('subscription_period_id');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('customer_item_sub_id')->references('id')->on('customer_item_subscription')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('unit_id')->references('id')->on('units')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('media_id')->references('id')->on('media')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subscription_period_id')->references('id')->on('subscription_periods')->onUpdate('cascade')->onDelete('cascade');
            
            
        });
        
        Schema::create('customer_subscription_status', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('customer_item_sub_id');
            $table->unsignedBigInteger('subscription_status_id');
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('customer_item_sub_id')->references('id')->on('customer_item_subscription')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subscription_status_id')->references('id')->on('subscription_status')->onUpdate('cascade')->onDelete('cascade');
            
        });
        
        Schema::create('invoices', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('customer_item_sub_id');
            $table->unsignedBigInteger('subscription_period_id');
            $table->string('number');
            $table->double('amount');
            $table->unsignedBigInteger('currency_id');
            $table->dateTime('date');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('customer_item_sub_id')->references('id')->on('customer_item_subscription')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subscription_period_id')->references('id')->on('subscription_periods')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            
        });
               
        Schema::create('payments', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('customer_item_sub_id');
            $table->unsignedBigInteger('subscription_period_id');
            $table->string('number');
            $table->double('amount');
            $table->unsignedBigInteger('currency_id');
            $table->dateTime('date');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            
            $table->foreign('customer_item_sub_id')->references('id')->on('customer_item_subscription')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('subscription_period_id')->references('id')->on('subscription_periods')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onUpdate('cascade')->onDelete('cascade');
            
        });

        Schema::create('invoice_payment', function(Blueprint $table){
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('payment_id');
            
            $table->foreign('invoice_id')->references('id')->on('invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->onUpdate('cascade')->onDelete('cascade');
            
        });

        Schema::create('customer_publishers', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('publisher_id');
            $table->softdeletes();
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onUpdate('cascade')->onDelete('cascade');
            
        });

        Schema::create('customer_publisher_product', function(Blueprint $table){
            $table->unsignedBigInteger('customer_publisher_id');
            $table->unsignedBigInteger('product_id');
            
            $table->foreign('customer_publisher_id')->references('id')->on('customer_publishers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_publisher_product');
        Schema::dropIfExists('customer_publishers');
        Schema::dropIfExists('customer_type_publishers');///to go
        Schema::dropIfExists('invoice_payment');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('customer_subscription_status');
        Schema::dropIfExists('subscription_quantities');
        Schema::dropIfExists('customer_subscription_period');
        Schema::dropIfExists('customer_item_subscription');
        Schema::dropIfExists('item_media');
        Schema::dropIfExists('media_medium');
        Schema::dropIfExists('media');
        Schema::dropIfExists('medium');
        Schema::dropIfExists('subscription_status');
        Schema::dropIfExists('item_period');
        Schema::dropIfExists('subscription_periods');
        Schema::dropIfExists('group_customer');
        Schema::dropIfExists('organisation_customer');
        Schema::dropIfExists('account_customer');
        Schema::dropIfExists('customers');
        Schema::dropIfExists('customer_types');
        Schema::dropIfExists('payment_types');//to go
    }
}
