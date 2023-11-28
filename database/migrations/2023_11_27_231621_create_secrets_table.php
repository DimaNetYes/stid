<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecretsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secrets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('password')->nullable();
            $table->text('title');
            $table->text('content');
            $table->integer('views')->default(0);
            $table->date('valid_until')->nullable();
            $table->boolean('delete_when_expired')->default(true);
            $table->string('hash')->nullable();
            $table->string('instructions')->nullable();

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
        Schema::dropIfExists('secrets');
    }
}
