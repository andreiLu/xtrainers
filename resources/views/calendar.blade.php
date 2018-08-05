@extends('layouts.app')

@section('content')

    <div class="main-content">
        <div class="left-section">
            <div class="left-nav-menu">
                {{--<span class="left-menu-item">Top Stories</span>--}}
                {{--<span class="left-menu-item">Saved Questions</span>--}}
                {{--<a class="left-menu-item" href="{{url('new-question')}}">New Question</a>--}}
                {{--<span class="left-menu-item">Bodybuilding</span>--}}
                {{--<span class="left-menu-item">Fitness</span>--}}
                {{--<span class="left-menu-item">Nutrition</span>--}}
                {{--<span class="left-menu-item">Recuperation</span>--}}
                {{--<span class="left-menu-item">Sport performance</span>--}}
                {{--@if ( ! $isSubscriber )--}}
                    {{--<a href="{{url('/all-clubs')}}" class="left-menu-item">View all clubs</a>--}}
                    {{--<a href="{{url('/add-class')}}" class="left-menu-item">Add class</a>--}}
                {{--@endif--}}

                {{--@if ( $isAdmin )--}}
                    {{--<a href="{{url('/add-trainer')}}" class="left-menu-item">Add trainer</a>--}}
                    {{--<a href="{{url('/add-club')}}" class="left-menu-item">Add club</a>--}}
                {{--@endif--}}

            </div>
        </div>
        <div class="week-days">
            <?php

            foreach ($weekDays as $day) {
                echo '<div class="single-day">';
                echo '<p class="week-day">' . $day['day'] . '</p>';
                echo '<p class="week-date">' . $day['date'] . '</p>';

                foreach ( $day['classes'] as $class ) {
                	$extra = $class->min_students_number < $class->students_number ? 'below-enrolled' : '' ;
					echo '<div class="single-class ' . $extra . ' ">';
					echo '<p class="class-title">' . $class->title . '</p>';
					echo '<p class="class-day">' . $class->day . '</p>';
					echo '<p class="class-time">Start: ' . $class->time . '</p>';
					echo '<p class="class-time">End: ' . $class->end_time . '</p>';
					echo '<p class="class-number">Allowed students: ' . $class->students_number . '</p>';
					echo '<p class="class-number">Enrolled students: ' . $class->enrolled_students . '</p>';

					if ( $isSubscriber ) {
					    echo '<a href="' . url( 'subscribe-to-class/' . $class->id ) . '">Subscribe to class</a>';
                    }

                    echo '<a href="single-class/' . $class->id . '">View more details</a>';

					echo '</div>';
                }

                echo '</div>';
            }

            ?>

        </div>
    </div>
@endsection

<style>

    .below-enrolled{
        opacity: 0.5;
    }

    .main-content{
        margin: 0!important;
        margin-top: -1.5rem !important;
        background-color: rgba(17, 16, 8, 0.52);
        min-height: 720px;
        position: absolute;
        width: 100%;
    }

    .left-section {
        max-width: 20%;
        margin: 0;
        padding: 15px;
        float: left;
    }

    .left-nav-menu {
        margin-top: 50px;
        margin-left: 50px;
    }

    .left-menu-item {
        text-transform: capitalize;
        color: white;
        font-size: 20px;
        display: block;

    }

    .right-section {
        margin-left: 20%;
        position: relative;
    }

    .single-story {
        margin: 50px;
        color: white;
    }

    .story-category {
        margin-bottom: 30px;
        font-size: 20px;
    }

    .single-class {
        border: 1px dashed white;
        padding: 5px;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .single-day{
        float: left;
        margin: 20px;
        font-weight: bold;
    }

    .week-day {
        font-size: 25px;
        color: red;
        text-align: center;
    }

    .week-date{
        font-size: 25px;
        color: white;
    }

</style>