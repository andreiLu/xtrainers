<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;
use Storage;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view( 'home',
			array(
				'isSubscriber'      => $this->isSubscriber(),
				'isAdmin'           => $this->isAdmin(),
				'isTrainer'         => $this->isTrainer(),
				'isTrainerAccepted' => $this->isTrainerAccepted(),
				'trainerFiles'      => $this->getTrainerFiles(),
			)
		);
	}

	public function isSubscriber() {
		$role = \Auth::user()->roles()->first();

		return $role->getSubscriberRoleId() === $role->role_id;
	}

	public function isAdmin() {
		$role = \Auth::user()->roles()->first();

		return $role->getAdminRoleId() === $role->role_id;
	}

	public function isTrainer() {
		$role = \Auth::user()->roles()->first();

		return $role->getTeacherRoleId() === $role->role_id;
	}

	public function isTrainerAccepted() {
		return $this->isTrainer() && \Auth::user()->accepted;
	}

	public function uploadTrainerDocs( Request $request ) {
		$file     = $request->file( 'asset' );
		$filename = 'document_' . $file->getClientOriginalName() . '.' . $file->getClientOriginalExtension();
		$path     = $file->storeAs( 'assets/user_' . \Auth::user()->id, $filename );
		return redirect( 'home' );
	}

	public function getTrainerFiles() {
		return Storage::allFiles( 'assets/user_' . \Auth::user()->id );
	}
}
