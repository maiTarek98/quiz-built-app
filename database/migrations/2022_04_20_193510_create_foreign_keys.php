<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('quiz_id')->references('id')->on('quizes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_quizes', function(Blueprint $table) {
			$table->foreign('quiz_id')->references('id')->on('quizes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_answers', function(Blueprint $table) {
			$table->foreign('quiz_id')->references('id')->on('quizes')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_answers', function(Blueprint $table) {
			$table->foreign('question_id')->references('id')->on('questions')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

		Schema::table('questions', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('quizes', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});

		Schema::table('user_quizes', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('user_answers', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('questions', function(Blueprint $table) {
			$table->dropForeign('questions_quiz_id_foreign');
		});
		Schema::table('user_quizes', function(Blueprint $table) {
			$table->dropForeign('user_quizes_quiz_id_foreign');
		});
		Schema::table('user_answers', function(Blueprint $table) {
			$table->dropForeign('user_answers_quiz_id_foreign');
		});
		Schema::table('user_answers', function(Blueprint $table) {
			$table->dropForeign('user_answers_question_id_foreign');
		});
		
	}
}