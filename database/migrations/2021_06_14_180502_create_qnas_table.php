<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQnasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qnas', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('description');
            $table->enum('active', ['0', '1'])->default('1');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE qnas ADD qna INT(2) UNSIGNED ZEROFILL NOT NULL AFTER id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qnas');
    }
}
