<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->text('short_description')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_tag')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('language')->nullable()->default('en');
            $table->integer('type_id')->nullable();
            $table->integer('specialization_id')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('public_media_downloadable')->default(false);
            $table->string('featured_image')->nullable();
            $table->enum('status', ['Draft', 'Published'])->default('Draft');
            $table->timestamps();
        });
    }
}
