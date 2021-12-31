<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagTopicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tag_topic', function (Blueprint $table) {
            $table->foreignId('tag_id')->references('id')->on('tags')->onDelete('cascade');
            $table->foreignId('topic_id')->references('id')->on('topics')->onDelete('cascade');
            $table->primary(['tag_id', 'topic_id']);
            $table->timestamps();
        });
    }
}
