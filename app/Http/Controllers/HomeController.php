<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home',
            array(
                'isSubscriber' => $this->isSubscriber(),
                'isAdmin' => $this->isAdmin()
            )
        );
    }

    public function isSubscriber()
    {
        $role = \Auth::user()->roles()->first();

        return $role->getSubscriberRoleId() === $role->role_id;
    }

    public function isAdmin() {
        $role = \Auth::user()->roles()->first();

        return $role->getAdminRoleId() === $role->role_id;
    }
}
