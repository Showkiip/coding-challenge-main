<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_invitations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sent_invitation');
            $table->unsignedBigInteger('received_invitation');
            $table->boolean('status')->default(0)->comment('0 = pending  1= accepted, 2 = rejected,');
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
        Schema::dropIfExists('request_invitations');
    }
};
