<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserAnswersTable extends Migration {

	public function up()
	{
		Schema::create('user_answers', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->bigInteger('user_id')->unsigned()->index();
			$table->bigInteger('quiz_id')->unsigned()->index();
			$table->bigInteger('question_id')->unsigned()->index();
			$table->integer('user_answer');
			$table->enum('check_answer', array('yes', 'no'));

		});
	}

	public function down()
	{
		Schema::drop('user_answers');
	}
}