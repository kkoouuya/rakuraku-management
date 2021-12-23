<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendeesTable extends Migration
{
    public function up()
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->string('attendee_id', 36)->primary();
            $table->string('name', 50);
            $table->string('number', 10);
            $table->string('dep_id', 36);
            $table->foreign('dep_id')->references('dep_id')->on('departments');
            $table->integer('in')->default(0);
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->useCurrent()->useCurrentOnUpdate();

            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attendees');
    }
}
