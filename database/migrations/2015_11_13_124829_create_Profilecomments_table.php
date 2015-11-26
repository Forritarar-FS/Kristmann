<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilecommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('profilecomments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('profile_name');
			$table->text('comment');
			$table->text('current_user');
			$table->string('current_userPhoto');
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
		Schema::drop('profilecomments');
	}

}
