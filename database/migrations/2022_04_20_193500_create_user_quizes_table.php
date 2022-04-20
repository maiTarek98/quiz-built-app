<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserQuizesTable extends Migration {

	public function up()
	{
		Schema::create('user_quizes', function(Blueprint $table) {
			$table->id();
			$table->timestamps();
			$table->bigInteger('user_id')->unsigned()->index();
			$table->bigInteger('quiz_id')->unsigned()->index();
			$table->integer('score');
		});
	}

	public function down()
	{
		Schema::drop('user_quizes');
	}
}