<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('lastname')->after('name');
            $table->string('avatar')->nullable();
            $table->string('slug');
            $table->string('phone')->nullable();
            $table->date('birthday_date')->nullable();
            $table->string('presentation')->nullable();
            $table->text('detailed_description')->nullable();
            $table->boolean('is_available')->default(false);
            $table->string('business_days')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
