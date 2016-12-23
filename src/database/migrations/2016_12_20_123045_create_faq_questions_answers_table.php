<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Ourgarage\Faq\Models\QuestionAnswer;

class CreateFaqQuestionsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faq_questions_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('faq_category_id')->unsigned();
            $table->string('status')->default(QuestionAnswer::STATUS_ACTIVE)->index();
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->text('question');
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
        Schema::drop('faq_questions_answers');
    }
}
