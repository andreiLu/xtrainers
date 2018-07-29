<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;
use Xtrainers\User;
use Xtrainers\Role;

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
        if ( ! $this->isAdmin() ) {
            return redirect('home');
        }

        return view('add-trainer', array('users' => $this->getUsersData()));
    }

    public function getUsersData()
    {
        $users = $users = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'subscriber');
        })->get();

        return $users;
    }

    public function isAdmin()
    {
        $role = \Auth::user()->roles()->first();

        return $role->getAdminRoleId() === $role->role_id;
    }

    public function createNewTrainer($id)
    {
        $user = User::find($id);
        $user->roles()->sync(array(2));

        return redirect('add-trainer');
    }
}
