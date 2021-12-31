<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChapterRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chapter_id')->references('id')->on('chapters');
            $table->foreignId('requester_id')->references('id')->on('users');
            $table->foreignId('approver_id')->nullable()->references('id')->on('users');
            $table->enum('status', ['pending', 'approved', 'rejected', 'cancelled', 'withdrawn']);
            $table->timestamps();
        });
    }
}
