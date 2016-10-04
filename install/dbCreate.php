<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

//Create security (users) levels table
Capsule::schema()->create('users_levels', function (Blueprint $table) {
    $table->increments('id');
    $table->boolean('is_admin')->default(0);
    $table->integer('level_value')->default(1);
});

//Create security (categories) levels table
Capsule::schema()->create('categories_levels', function (Blueprint $table) {
    $table->increments('id');
    $table->boolean('is_locked')->default(0);
    $table->integer('level_value')->default(1);
});

//Create categories table
Capsule::schema()->create('categories', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->text('description')->nullable();
    $table->integer('level_id')->default(2);
    $table->foreign('level_id')->references('id')->on('categories_levels');
});

//Create ranks table
Capsule::schema()->create('ranks', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->integer('level_id')->default(2);
    $table->foreign('level_id')->references('id')->on('users_levels');
});

//Create users table
Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('username');
    $table->string('email');
    $table->string('password');
    $table->integer('rank_id')->unsigned();
    $table->string('first_name')->nullable();
    $table->string('last_name')->nullable();
    $table->date('birthdate')->nullable();
    $table->timestamps();
    $table->foreign('rank_id')->references('id')->on('ranks');
});
