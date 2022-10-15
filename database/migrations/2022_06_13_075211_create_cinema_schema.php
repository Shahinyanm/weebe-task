<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCinemaSchema extends Migration
{
    /** ToDo: Create a migration that creates all tables for the following user stories

    For an example on how a UI for an api using this might look like, please try to book a show at https://in.bookmyshow.com/.
    To not introduce additional complexity, please consider only one cinema.

    Please list the tables that you would create including keys, foreign keys and attributes that are required by the user stories.

    ## User Stories

     **Movie exploration**
     * As a user I want to see which films can be watched and at what times
     * As a user I want to only see the shows which are not booked out

     **Show administration**
     * As a cinema owner I want to run different films at different times
     * As a cinema owner I want to run multiple films at the same time in different showrooms

     **Pricing**
     * As a cinema owner I want to get paid differently per show
     * As a cinema owner I want to give different seat types a percentage premium, for example 50 % more for vip seat

     **Seating**
     * As a user I want to book a seat
     * As a user I want to book a vip seat/couple seat/super vip/whatever
     * As a user I want to see which seats are still available
     * As a user I want to know where I'm sitting on my ticket
     * As a cinema owner I dont want to configure the seating for every show
     */


//That is not finished yet as  you see, haven't enough time for view deeper
    public function up()
    {
        Schema::create('films', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->boolean('availability')->default(false);
            $table->string('duration')->nullable();
            $table->timestamps();
        });

        Schema::create('user_films', function($table) {
            $table->increments('id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('film_id')->constrained('films')->cascadeOnDelete();
            $table->boolean('booked')->default(false);
            $table->timestamps();
        });

        Schema::create('showroom', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamp('start')->nullable();
            $table->timestamp('end')->nullable();
            $table->foreignId('film_id')->constrained('films')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('seat_types', function($table) {
            $table->increments('id');
            $table->string('type');
            $table->foreignId('price_id')->constrained('prices')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('seats', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->foreignId('seat_type_id')->constrained('seat_types')->cascadeOnDelete();

            $table->timestamps();
        });

        Schema::create('prices', function($table) {
            $table->increments('id');
            $table->decimal('price',11,2)->default(0);
            $table->timestamps();
        });



        Schema::create('user_seats', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('seats')->nullable();
            $table->foreignId('seat_id')->constrained('seats')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });







        Schema::create('stories', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });
        throw new \Exception('implement in coding task 4, you can ignore this exception if you are just running the initial migrations.');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
