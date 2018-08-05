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
		$model                       = new TeacherClass();
		$model->title                = $request->post( 'class_title' );
		$model->teacher_id           = $request->user()->id;
		$model->day                  = $request->post( 'class_date' );
		$model->time                 = $request->post( 'class_time' );
		$model->end_time             = $request->post( 'class_end_time' );
		$model->students_number      = $request->post( 'class_students_number' );
		$model->min_students_number  = $request->post( 'min_students_number' );
		$model->enrolled_students    = 0;
		$model->private              = $request->post( 'class_type' );
		$model->intensity            = $request->post( 'class_intensity' ) + 1;
		$model->category             = $request->post( 'class_category' );
		$model->allow_online_booking = $request->post( 'allow_online_booking' ) === 'deny' ? false : true;
		$model->unbook_time          = $request->post( 'unbook_time' );
		$model->save();

		return redirect( 'calendar' );
	}

	public function subscribeToClass( $classId ) {
		$model = TeacherClass::where( 'id', $classId )->first();
		$model->enrolled_students ++;
		$model->save();

		return redirect( 'home' );
	}

	public function singleClass( $id ) {
		return view( 'single-class', array( 'class' => TeacherClass::find( $id ) ) );
	}
}
