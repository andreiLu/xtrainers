<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;
use Xtrainers\User;

class DummyData extends Controller
{
    public function getDumyNames() {
        $names = array(
            'Adrian',
            'Dan',
            'Andrei',
            'Christopher',
            'Ryan',
            'Ethan',
            'Ana',
            'George',
            'John',
            'Zoey',
            'Stefan',
            'Sarah',
            'Michelle',
            'Samantha',
            'Cristian'
        );

        $surnames = array(
            'Popescu',
            'Walker',
            'Thompson',
            'Vasilescu',
            'Anderson',
            'Johnson',
            'Popa',
            'Tremblay',
            'Peltier',
            'Marcu',
            'Cunningham',
            'Simpson',
            'Mercado',
            'Sellers'
        );

        $random_name = $names[mt_rand(0, sizeof($names) - 1)];
        $random_surname = $surnames[mt_rand(0, sizeof($surnames) - 1)];

        return $random_name . ' ' . $random_surname;
    }

    public function GetDummySubscribers() {
        return $this->getDumyNames() . ' Subscriber';
    }

    public function GetDummyTrainers() {
        return $this->getDumyNames() . ' Trainer';
    }

    public function doDummyData( Request $request ) {
        $subscribers = $request->post('subscriber_number');
        $trainers = $request->post('trainers_number');

        if ( $subscribers > 0 ) {
            for ($x = 0; $x <= $subscribers; $x++) {
                $user = User::create( array(
                    'name' =>$x . " " . $this->GetDummySubscribers(),
                    'email' => 'dumy_subscriber' . $x . '@yahoo.com',
                    'password' => bcrypt( '123456' )
                ) );

                $user->roles()->attach(3);
            }
        }

        if ( $trainers > 0 ) {
            for ($x = 0; $x <= $trainers; $x++) {

                $user = User::create( array(
                    'name' => $x . " " . $this->GetDummyTrainers(),
                    'email' => 'dumy_trainer' . $x . '@yahoo.com',
                    'password' => bcrypt( '123456' )
                ) );

                $user->roles()->attach(2);
            }

        }

        return redirect( 'home' );
    }

    public function dummyDataView() {
        return view( 'dummy-data' );
    }
}
