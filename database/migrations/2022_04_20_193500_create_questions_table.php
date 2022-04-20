<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->bigInteger('quiz_id')->unsigned()->index();
			$table->text('question');
			$table->string('option_1');
			$table->string('option_2');
			$table->string('option_3');
			$table->string('option_4');
			$table->integer('correct_option');
			$table->bigInteger('user_id')->unsigned()->index();

		});
	}

	public function down()
	{
		Schema::drop('questions');
	}
}