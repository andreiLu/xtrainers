<?php

namespace Xtrainers\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Xtrainers\TeacherClass;
use Auth;
class CalendarController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware( 'auth' );
	}

	/**
	 * @return array
	 */
	public function getCalendar() {
		$startOfWeek = Carbon::now()->startOfWeek()->subDay();
		$weekDays    = array();

		for ( $i = 0; $i < Carbon::DAYS_PER_WEEK; $i ++ ) {
			$weekDay         = $startOfWeek->addDay()->dayOfWeek;
			$dayData         = array();
			$dayData['date'] = $startOfWeek->toDateString();

			switch ( $weekDay ) {
				case Carbon::SUNDAY:
					$dayData['day'] = 'Duminica';
					break;

				case Carbon::MONDAY:
					$dayData['day'] = 'Luni';
					break;

				case Carbon::TUESDAY:
					$dayData['day'] = 'Marti';
					break;

				case Carbon::WEDNESDAY:
					$dayData['day'] = 'Miercuri';
					break;

				case Carbon::THURSDAY:
					$dayData['day'] = 'Joi';
					break;

				case Carbon::FRIDAY:
					$dayData['day'] = 'Vineri';
					break;

				case Carbon::SATURDAY:
					$dayData['day'] = 'Sambata';
					break;

				default:
					break;
			}

			$weekDays[] = $dayData;
		}

		$weekDays = $this->getClassesOfTheDay( $weekDays );

		return view( 'calendar', [ 'weekDays' => $weekDays ] );
	}

	public function getClassesOfTheDay( $weekDays ) {
		$classes = TeacherClass::all();

		foreach ( $weekDays as $key => $weekDay ) {
			$weekDay['classes'] = $classes->where( 'day', $weekDay['date'] )->all();

			$weekDays[ $key ] = $weekDay;
		}

		return $weekDays;
	}
}
