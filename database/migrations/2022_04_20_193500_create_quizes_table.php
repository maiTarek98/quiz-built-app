<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizesTable extends Migration {

	public function up()
	{
		Schema::create('quizes', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->string('title', 191);
			$table->text('description');
			$table->integer('no_question');
			$table->integer('passing_score');
			$table->integer('score_question');
			$table->enum('status', array('show', 'hide'));
			$table->bigInteger('user_id')->unsigned()->index();

		});
	}

	public function down()
	{
		Schema::drop('quizes');
	}
}