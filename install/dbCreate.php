<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

//Create ranks table
Capsule::schema()->create('ranks', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
});

//Create categories table
Capsule::schema()->create('categories', function (Blueprint $table) {
    $table->increments('id');
    $table->string('name');
    $table->text('description')->nullable();
});

//Create rights levels table
Capsule::schema()->create('rights_levels', function (Blueprint $table) {
    $table->increments('id');
    $table->boolean('can_read');
    $table->boolean('can_write');
    $table->boolean('can_moderate');
    $table->boolean('is_admin')->default(0);
    $table->integer('rank_id');
    $table->foreign('rank_id')->references('id')->on('ranks');
    $table->integer('apply_on_cat_id');
    $table->foreign('apply_on_cat_id')->references('id')->on('categories');
});

//Create users table
Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('id');
    $table->string('username');
    $table->string('email');
    $table->string('password');
    $table->integer('rank_id');
    $table->foreign('rank_id')->references('id')->on('ranks');
    $table->string('first_name')->nullable();
    $table->string('last_name')->nullable();
    $table->date('birthdate')->nullable();
    $table->timestamps();
});

//Create topics table
Capsule::schema()->create('threads', function (Blueprint $table) {
    $table->increments('id');
    $table->string('title');
    $table->integer('author_id');
    $table->foreign('author_id')->references('id')->on('users');
    $table->timestamps();
});
