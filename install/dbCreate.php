<?php
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

//Create config table
Capsule::schema()->create('config', function (Blueprint $table) {
    $table->engine = 'InnoDB';
    $table->increments('id');
    $table->string('param_name')->unique();
    $table->enum('param_type', array('string', 'integer'))->default('string');
    $table->string('param_string')->nullable();
    $table->integer('param_integer')->nullable();
});

//Create extensions table
Capsule::schema()->create('extensions', function (Blueprint $table) {
    $table->engine = 'InnoDB';
    $table->increments('id');
    $table->string('name');
    $table->string('author_name');
    $table->boolean('is_enabled')->default(0);
});

//Create ranks table
Capsule::schema()->create('ranks', function (Blueprint $table) {
    $table->engine = 'InnoDB';
    $table->increments('id');
    $table->string('name')->unique();
});

//Create categories table
Capsule::schema()->create('categories', function (Blueprint $table) {
    $table->engine = 'InnoDB';
    $table->increments('id');
    $table->string('name');
    $table->text('description')->nullable();
});

//Create threads status table
Capsule::schema()->create('threads_status', function (Blueprint $table) {
    $table->engine = 'InnoDB';
    $table->increments('id');
    $table->string('status');
});

//Create rights levels table
Capsule::schema()->create('rights_levels', function (Blueprint $table) {
    $table->engine = 'InnoDB';
    $table->increments('id');
    $table->boolean('can_read');
    $table->boolean('can_write');
    $table->boolean('can_moderate');
    $table->boolean('is_admin')->default(0);
    $table->integer('rank_id')->unsigned();
    $table->foreign('rank_id')->references('id')->on('ranks');
    $table->integer('apply_on_cat_id')->unsigned()->nullable();
    $table->foreign('apply_on_cat_id')->references('id')->on('categories');
});

//Create users table
Capsule::schema()->create('users', function (Blueprint $table) {
    $table->engine = 'InnoDB';
    $table->increments('id');
    $table->string('username')->unique();
    $table->string('email')->unique();
    $table->string('password');
    $table->integer('rank_id')->unsigned();
    $table->foreign('rank_id')->references('id')->on('ranks');
    $table->string('avatar')->nullable();
    $table->string('first_name')->nullable();
    $table->string('last_name')->nullable();
    $table->date('birthdate')->nullable();
    $table->timestamps();
});

//Create threads table
Capsule::schema()->create('threads', function (Blueprint $table) {
    $table->engine = 'InnoDB';
    $table->increments('id');
    $table->string('title');
    $table->integer('author_id')->unsigned();
    $table->foreign('author_id')->references('id')->on('users');
    $table->integer('category_id')->unsigned();
    $table->foreign('category_id')->references('id')->on('categories');
    $table->integer('status_id')->unsigned()->default(1);
    $table->foreign('status_id')->references('id')->on('threads_status');
    $table->timestamps();
});

//Create posts table
Capsule::schema()->create('posts', function (Blueprint $table) {
    $table->engine = 'InnoDB';
    $table->increments('id');
    $table->text('content');
    $table->integer('author_id')->unsigned();
    $table->foreign('author_id')->references('id')->on('users');
    $table->integer('thread_id')->unsigned();
    $table->foreign('thread_id')->references('id')->on('threads');
    $table->timestamps();
});
