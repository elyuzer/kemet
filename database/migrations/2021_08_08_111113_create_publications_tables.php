<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('products', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->unsignedBigInteger('publication_id');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('publication_id')->references('id')->on('publications')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('documents', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('product_id');
            $table->string('description')->nullable();
            $table->date('publication_date');
            $table->date('effective_date');
            $table->date('date_captured');
            $table->boolean('publisher');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('document_status', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('internal_document_status', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('document_status_id');
            $table->string('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('document_status_id')->references('id')->on('document_status')->onDelete('cascade')->onUpdate('cascade');
        });
       
        Schema::create('publishers', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('document_publisher', function(Blueprint $table){
            $table->unsignedBigInteger('document_id');
            $table->unsignedBigInteger('publisher_id');

            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_publisher');
        Schema::dropIfExists('publishers');
        Schema::dropIfExists('internal_document_status');
        Schema::dropIfExists('document_status');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('products');
        Schema::dropIfExists('publications');
    }
}
