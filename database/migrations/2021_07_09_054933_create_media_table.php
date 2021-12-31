<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('path')->nullable();
            $table->string('size')->nullable();
            $table->string('type')->nullable();
            $table->string('ext')->nullable();
            $table->integer('mediable_id');
            $table->string('mediable_type');
            $table->timestamps();
        });
    }
}
