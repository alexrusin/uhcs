<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('contact_person');
            $table->string('referred_by')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('relationship_to_client')->nullable();
            $table->string('present_location')->nullable();
            $table->string('care_desired');
            $table->string('client_condition');
            $table->string('walking_ability');
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
        Schema::dropIfExists('messages');
    }
}
