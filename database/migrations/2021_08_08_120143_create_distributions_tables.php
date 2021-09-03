<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistributionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distributions', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('pubisher');
            $table->softDeletes();
            $table->timestamps();
        });
        
        Schema::create('distribution_document', function(Blueprint $table){
            $table->unsignedBigInteger('distibution_id');
            $table->unsignedBigInteger('document_id');
            
            $table->foreign('distibution_id')->references('id')->on('distributions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('document_id')->references('id')->on('documents')->onUpdate('cascade')->onDelete('cascade');
            
        });

        Schema::create('distribution_dispatches', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('distribution_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('dispatcher_id');
            $table->date('date');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('distribution_id')->references('id')->on('distributions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('dispatcher_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('distribution_conditions', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        
        Schema::create('received_distributions', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('distribution_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('distribution_condition_id');
            $table->date('date');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('distribution_id')->references('id')->on('distributions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('distribution_condition_id')->references('id')->on('distribution_conditions')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('received_distributions');
        Schema::dropIfExists('distribution_conditions');
        Schema::dropIfExists('distribution_dispatches');
        Schema::dropIfExists('distribution_document');
        Schema::dropIfExists('distributions');
    }
}
