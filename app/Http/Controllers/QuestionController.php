<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Xtrainers\User;

class QuestionController extends HomeController
{
    /**
     * Store a new question.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $name = $request->input('data');

        $user = $request->user();

        dd($user);

    }
}
