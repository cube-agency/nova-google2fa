<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_2fa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('google2fa_enable')->default(false);
            $table->string('google2fa_secret')->nullable();
            $table->json('recovery')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on(config('nova-google2fa.tables.user'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_2fa');
    }
};
