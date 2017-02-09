<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ourgarage\Faq\Models\Faq;

class CreateFaqQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faq_category_id')->unsigned();
            $table->string('status')->default(Faq::STATUS_ACTIVE)->index();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('answer');
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
        Schema::drop('faq_questions');
    }
}
