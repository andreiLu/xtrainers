<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClassesMigration extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'teacher_classes', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'title' );
			$table->date( 'day' );
			$table->time( 'time' );
			$table->time( 'end_time' );
			$table->time( 'unbook_time' );
			$table->integer( 'students_number' );
			$table->integer( 'min_students_number' );
			$table->integer( 'enrolled_students' );
			$table->integer( 'teacher_id' );
			$table->integer( 'intensity' );
			$table->string( 'category' );
			$table->boolean( 'private' )->default( true );
			$table->boolean( 'allow_online_booking' )->default( true );
			$table->rememberToken();
			$table->timestamps();
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('classes');
	}
}
