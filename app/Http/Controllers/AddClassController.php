<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;
use Xtrainers\TeacherClass;

class AddClassController extends Controller
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

    public function newClass()
    {
        return view('new-class');
    }

    public function test(Request $request)
    {
        $model = new TeacherClass();
        $model->title = $request->post('class_title');
        $model->teacher_id = $request->user()->id;
        $model->day = $request->post('class_date');
        $model->time = $request->post('class_time');
        $model->students_number = $request->post('class_students_number');
        $model->save();

        return redirect('calendar');
    }
}
