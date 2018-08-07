<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;
use Xtrainers\TeacherClass;

/**
 * Class AddClassController
 * @package Xtrainers\Http\Controllers
 */
class AddClassController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function newClass() {
		return view( 'new-class' );
	}
	
	/**
	 * @param Request $request
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function test( Request $request ) {
		$model                              = new TeacherClass();
		$model->title                       = $request->post( 'class_title' );
		$model->teacher_id                  = $request->user()->id;
		$model->day                         = $request->post( 'class_date' );
		$model->time                        = $request->post( 'class_time' );
		$model->end_time                    = $request->post( 'class_end_time' );
		$model->students_number             = $request->post( 'class_students_number' );
		$model->min_students_number         = $request->post( 'min_students_number' );
		$model->enrolled_students           = 0;
		$model->private                     = $request->post( 'class_private' );
		$model->intensity                   = $request->post( 'class_intensity' ) + 1;
		$model->category                    = $request->post( 'class_category' );
		$model->allow_online_booking        = $request->post( 'allow_online_booking' ) === 'deny' ? false : true;
		$model->unbook_time                 = $request->post( 'unbook_time' );
		$model->class_type                  = $request->post( 'class_type' );
		$model->class_price                 = $this->getClassPrice( $request->post( 'class_type' ), $request->post( 'class_price' ) );
		$model->class_currency              = $this->getClassClassCurrency( $request->post( 'class_type' ) );
		$model->require_active_subscription = $request->post( 'require_active_subscription' ) === null ? false : true;
		$model->save();
		
		return redirect( 'calendar' );
	}
	
	/**
	 * @param $type
	 * @param $price
	 *
	 * @return int
	 */
	public function getClassPrice( $type, $price ) {
		return $type === 'free' ? 0 : ( int ) $price;
	}
	
	/**
	 * Get class currency based on user input
	 * @todo careful at this method response
	 *
	 * @param $type
	 *
	 * @return bool|string
	 */
	public function getClassClassCurrency( $type ) {
		if ( $type === 'free' ) {
			return false;
		}
		
		return $type === 'credits' ? 'credits' : 'money';
	}
	
	/**
	 * @param $classId
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function subscribeToClass( $classId ) {
		$model = TeacherClass::where( 'id', $classId )->first();
		$model->enrolled_students++;
		$model->save();
		
		return redirect( 'home' );
	}
	
	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function singleClass( $id ) {
		return view( 'single-class', array( 'class' => TeacherClass::find( $id ) ) );
	}
}
