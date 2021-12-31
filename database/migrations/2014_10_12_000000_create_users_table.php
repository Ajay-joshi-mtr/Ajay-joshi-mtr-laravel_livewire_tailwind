<?php

use App\Providers\AppServiceProvider;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger(AppServiceProvider::OWNER_FIELD);
            $table->unsignedBigInteger('role_id');
            $table->string('email')->unique();
            $table->string('full_name')->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('mobile_alt', 15)->nullable();
            $table->string('city', 30)->nullable();
            $table->string('state', 30)->nullable();
            $table->string('pincode', 10)->nullable();
            $table->string('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('role_id')->references('id')->on('roles');
            $table->foreign(AppServiceProvider::OWNER_FIELD)->references('id')->on('users');
        });
    }
}
