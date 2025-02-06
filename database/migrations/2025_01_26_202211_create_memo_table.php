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
        Schema::create('memos', function (Blueprint $table) {
            $table->id();
            $table->string('title1')->nullable()->change();
            $table->string('title2')->nullable()->change();
            $table->string('title3')->nullable()->change();
            $table->string('title4')->nullable()->change();
            $table->string('title5')->nullable()->change();
            $table->string('title6')->nullable()->change();
            $table->string('title7')->nullable()->change();

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
        Schema::dropIfExists('memos');
    }
};
