<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('user_account', function(Blueprint $table){
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('account_id');

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('organisations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->softDeletes();
            $table->timestamps();
        });        

        Schema::create('user_organisation', function(Blueprint $table){
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('organisation_id');

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('organisation_id')->references('id')->on('organisations')->onUpdate('cascade')->onDelete('cascade');

        });

        Schema::create('account_organisation', function(Blueprint $table){
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('organisation_id');

            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('organisation_id')->references('id')->on('organisations')->onUpdate('cascade')->onDelete('cascade');

        });        

        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name');
            $table->unsignedBigInteger('organisation_id');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('organisation_id')->references('id')->on('organisations')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::create('user_group', function(Blueprint $table){
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('group_id');

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');

        });       

        Schema::create('account_group', function(Blueprint $table){
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('group_id');

            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');

        });       

        Schema::create('emails', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('address');
            $table->softDeletes();
            $table->timestamps();
        });      

        Schema::create('phones', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('number');
            $table->softDeletes();
            $table->timestamps();
        });      

        Schema::create('postals', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('address');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('account_email', function(Blueprint $table){
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('email_id');

            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('email_id')->references('id')->on('emails')->onUpdate('cascade')->onDelete('cascade');

        }); 

        Schema::create('account_phone', function(Blueprint $table){
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('phone_id');

            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('phone_id')->references('id')->on('phones')->onUpdate('cascade')->onDelete('cascade');

        }); 

        Schema::create('account_postal', function(Blueprint $table){
            $table->unsignedBigInteger('account_id');
            $table->unsignedBigInteger('postal_id');

            $table->foreign('account_id')->references('id')->on('accounts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('postal_id')->references('id')->on('postals')->onUpdate('cascade')->onDelete('cascade');

        }); 

        Schema::create('organisation_email', function(Blueprint $table){
            $table->unsignedBigInteger('organisation_id');
            $table->unsignedBigInteger('email_id');

            $table->foreign('organisation_id')->references('id')->on('organisations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('email_id')->references('id')->on('emails')->onUpdate('cascade')->onDelete('cascade');

        }); 

        Schema::create('organisation_phone', function(Blueprint $table){
            $table->unsignedBigInteger('organisation_id');
            $table->unsignedBigInteger('phone_id');

            $table->foreign('organisation_id')->references('id')->on('organisations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('phone_id')->references('id')->on('phones')->onUpdate('cascade')->onDelete('cascade');

        }); 

        Schema::create('organisation_postal', function(Blueprint $table){
            $table->unsignedBigInteger('organisation_id');
            $table->unsignedBigInteger('postal_id');

            $table->foreign('organisation_id')->references('id')->on('organisations')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('postal_id')->references('id')->on('postals')->onUpdate('cascade')->onDelete('cascade');

        }); 

        Schema::create('group_email', function(Blueprint $table){
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('email_id');

            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('email_id')->references('id')->on('emails')->onUpdate('cascade')->onDelete('cascade');

        }); 

        Schema::create('group_phone', function(Blueprint $table){
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('phone_id');

            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('phone_id')->references('id')->on('phones')->onUpdate('cascade')->onDelete('cascade');

        }); 

        Schema::create('group_postal', function(Blueprint $table){
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('postal_id');

            $table->foreign('group_id')->references('id')->on('groups')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('postal_id')->references('id')->on('postals')->onUpdate('cascade')->onDelete('cascade');

        }); 

        Schema::create('user_logs', function(Blueprint $table){
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
            $table->dateTime('in');
            $table->dateTime('out');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_logs');
        Schema::dropIfExists('group_postal');
        Schema::dropIfExists('group_phone');
        Schema::dropIfExists('group_email');
        Schema::dropIfExists('organisation_postal');
        Schema::dropIfExists('organisation_phone');
        Schema::dropIfExists('organisation_email');
        Schema::dropIfExists('account_postal');
        Schema::dropIfExists('account_phone');
        Schema::dropIfExists('account_email');
        Schema::dropIfExists('postals');
        Schema::dropIfExists('phones');
        Schema::dropIfExists('emails');
        Schema::dropIfExists('account_group');
        Schema::dropIfExists('user_group');
        Schema::dropIfExists('groups');
        Schema::dropIfExists('account_organisation');
        Schema::dropIfExists('user_organisation');
        Schema::dropIfExists('organisations');
        Schema::dropIfExists('user_account');
        Schema::dropIfExists('accounts');
    }
}
