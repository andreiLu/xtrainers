<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;

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

    }
}
