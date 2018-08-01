<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;
use Xtrainers\Club;
use Xtrainers\User;
use Xtrainers\Role;
use DB;

class TrainerController extends Controller
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

    public function newTrainer()
    {
        if (!$this->isAdmin()) {
            return redirect('home');
        }

        return view('add-trainer', array('users' => $this->getUsersData()));
    }

    public function isAdmin()
    {
        $role = \Auth::user()->roles()->first();

        return $role->getAdminRoleId() === $role->role_id;
    }

    public function getUsersData()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'subscriber');
        })->get();

        return $users;
    }

    public function createNewTrainer($id)
    {
        $user = User::find($id);
        $user->roles()->sync(array(2));

        return redirect('add-trainer');
    }

    public function allTrainers()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('roles.role_id', '=', 1)->orWhere('roles.role_id', '=', 2);
        })->get();

        foreach ($users as $key => $user) {
            $clubObj = DB::table('club_user')->where('user_id', $user->id)->first();
            $club_id = isset($clubObj) ? $clubObj->club_id : null;
            $user->club = Club::where( 'id', $club_id )->first();
            $users[$key] = $user;
        }

        return view('trainers', array('trainers' => $users));
    }

    public function allSubscribers()
    {
        $users = User::whereHas('roles', function ($query) {
            $query->where('roles.role_id', '=', 3);
        })->get();

        return view('subscribers', array('subscribers' => $users));
    }


}
