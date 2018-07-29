<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;
use Xtrainers\Club;

class ClubController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function newClub()
    {
        if (!$this->isAdmin()) {
            return redirect('home');
        }

        return view('new-club');
    }

    public function isAdmin()
    {
        $role = \Auth::user()->roles()->first();

        return $role->getAdminRoleId() === $role->role_id;
    }

    public function createNewClub(Request $request)
    {
        $model = new Club();
        $model->name = $request->post('club_title');
        $model->address = $request->post('club_address');

        $model->save();

        return redirect('all-clubs' );
    }

    public function allClubs()
    {
        return view('all-clubs', array('clubs' => Club::all()));
    }
}
