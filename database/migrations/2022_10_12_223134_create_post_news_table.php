<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_news', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->index();
            $table->string('title');
            $table->text('description');
            $table->text('image')
                ->comment('This is image');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

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
        Schema::dropIfExists('post_news');
    }
};
