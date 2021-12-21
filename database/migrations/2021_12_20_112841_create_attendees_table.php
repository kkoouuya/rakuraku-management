<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendeesTable extends Migration
{
    public function up()
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('number', 10)->unique();
            $table->foreignId('dep_id')->constrained('departments');
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();

            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendees');
    }
}
