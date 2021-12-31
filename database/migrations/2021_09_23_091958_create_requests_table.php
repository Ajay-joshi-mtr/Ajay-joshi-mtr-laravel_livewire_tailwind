<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('requester_name');
            $table->string('requester_mobile');
            $table->string('research_title')->nullable();
            $table->string('research_area')->nullable();
            $table->string('research_domain')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }
}
