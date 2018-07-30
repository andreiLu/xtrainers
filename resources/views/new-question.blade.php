@extends('layouts.app')

@section('content')
    <div class="main-content">

        <div class="left-section">
            <div class="left-nav-menu">
                <span class="left-menu-item">Top Stories</span>
                <span class="left-menu-item">Saved Questions</span>
                <a class="left-menu-item" href="{{url('new-question')}}">New Question</a>
                <span class="left-menu-item">Bodybuilding</span>
                <span class="left-menu-item">Fitness</span>
                <span class="left-menu-item">Nutrition</span>
                <span class="left-menu-item">Recuperation</span>
                <span class="left-menu-item">Sport performance</span>
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

        <div class="right-section main-section">
            <div class="story-section">

                {{ Form::open(['route' => 'user.new.question']) }}
                {{ Form::label('topic_title', 'Question Title', ['class' => 'custom-label']) }}
                {{ Form::input('text', 'topic_title', '', ['class' => 'input-title']) }}
                {{ Form::label('topic_content', 'Question content', ['class' => 'custom-label']) }}
                {{ Form::textarea( 'topic_content', '', ['class' => 'input-title']) }}
                {{ Form::submit('Submit!', ['class' => 'submit-button'])  }}
                {{ Form::close() }}

            </div>
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

    .center-content {
        margin-left: auto!important;
        margin-right: auto!important;
        max-width: 1120px;
        display: block;
        padding: 15px;
    }

    .custom-label {
        display: block;
        position: static;
        margin: 0;
        padding: 0;
        color:#fff;
        font-family: 'Arvo';
        font-size: 16px;
    }

    .input-title{
        display:block;
        width: 300px;
        padding: 15px 0 15px 12px;
        font-family: "Arvo";
        font-weight: 400;
        color: #377D6A;
        background: rgba(0,0,0,0.3);
        border: none;
        outline: none;
        color: #fff;
        text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
        border: 1px solid rgba(0,0,0,0.3);
        border-radius: 4px;
        box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px  1px rgba(255,255,255,0.2);
        text-indent: 60px;
        transition: all .3s ease-in-out;
        position: relative;
        font-size: 13px;
    }

</style>