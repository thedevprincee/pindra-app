<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug');
            $table->string('description');
            $table->string('long_description')->nullable();
            $table->enum('type', ['normal', 'scholarship', 'short', ])->default('normal');
            $table->string('image')->nullable();
            $table->double('price');
            $table->double('offer_price')->nullable();
            $table->string('tags')->nullable();
            $table->string('prerequisite')->nullable();
            $table->string('show_homepage')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('courses');
    }
}
