<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;
use Xtrainers\TeacherClass;

class AddClassController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	public function newClass() {
		return view( 'new-class' );
	}

	public function test( Request $request ) {
		$title   = $request->post( 'class_title' );
		$user_id = $request->user()->id;
		$day     = $request->post( 'class_date' );
		$time    = $request->post( 'class_time' );

		$model             = new TeacherClass();
		$model->title      = $title;
		$model->teacher_id = $user_id;
		$model->day        = $day;
		$model->time       = $time;
		$model->save();

		return redirect( 'calendar' );
	}
}
