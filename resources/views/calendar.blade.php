@extends('layouts.app')

@section('content')

    <?php

//            dd($weekDays)

    ?>

    <div class="main-content">
        <div class="left-section">
            <div class="left-nav-menu">
                <span class="left-menu-item">Top Stories</span>
                <span class="left-menu-item">Saved Questions</span>
                <router-link class="left-menu-item" to="/question">New Questions</router-link>
                <span class="left-menu-item">Bodybuilding</span>
                <span class="left-menu-item">Fitness</span>
                <span class="left-menu-item">Nutrition</span>
                <span class="left-menu-item">Recuperation</span>
                <span class="left-menu-item">Sport performance</span>
            </div>
        </div>
        <div class="week-days">
            <?php

            foreach ($weekDays as $day) {
                echo '<div class="single-day">';
                echo '<p class="week-day">' . $day['day'] . '</p>';
                echo '<p class="week-date">' . $day['date'] . '</p>';
                echo '</div>';
            }

            ?>

        </div>
    </div>
@endsection

<style>

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