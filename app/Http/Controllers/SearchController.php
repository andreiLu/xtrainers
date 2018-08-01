<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Xtrainers\User;

class SearchController extends Controller
{
    public function handleSearch( Request $request ) {
        $q = $request->post( 'search_q' );

        return view( 'search', ['data' =>$this->getSearchData($q)] );
    }

    /**
     * Get the data based on query string
     *
     * @param $q
     * @return array
     */
    public function getSearchData( $q ) {
        $data = array();
//        $data['classes'] = DB::table('teacher_classes')->where('title', 'like', "%$q%")->get()->toArray();
        $data['topics'] = DB::table('topics')->where('topic_title', 'like', "%$q%")->get()->toArray();
        $data['clubs'] = DB::table('clubs')->where('name', 'like', "%$q%")->get()->toArray();
        $data['trainers'] = User::whereHas('roles', function ($query) {
            $query->where('name', '=', 'trainer');
        })->where('name', 'like', "%$q%")->get();

//        dd($data );

        return $data;
    }
}
