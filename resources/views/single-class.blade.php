@extends('layouts.app')

@section('content')
    <div class="main-content">

        <div class="center-content">
            <h1>Class details</h1>

            <div class="row class-detail">
                <div class="col-md-3"></div>
                <div class="col-md-1"></div>
            </div>

            <div class="row class-detail">
                <div class="col-md-3"></div>
                <div class="col-md-1"></div>
            </div>

            <div class="row class-detail">
                <div class="col-md-3">Class Title</div>
                <div class="col-md-2">{{$class->title}}</div>
            </div>

            <div class="row class-detail">
                <div class="col-md-3">Class Category</div>
                <div class="col-md-2">{{$class->category}}</div>
            </div>

            <div class="row class-detail">
                <div class="col-md-3">Class Intensity</div>
                <div class="col-md-2">{{$class->intensity}}</div>
            </div>

            <div class="row class-detail">
                <div class="col-md-3">Class Day</div>
                <div class="col-md-2">{{$class->day}}</div>
            </div>

            <div class="row class-detail">
                <div class="col-md-3">Class Start Time</div>
                <div class="col-md-2">{{$class->time}}</div>
            </div>

            <div class="row class-detail">
                <div class="col-md-3">Class End Time</div>
                <div class="col-md-2">{{$class->end_time}}</div>
            </div>

            <div class="row class-detail">
                <div class="col-md-3">Class Type</div>
                <div class="col-md-2">{{$class->class_type}}</div>
            </div>

            <div class="row class-detail">
                <div class="col-md-3">Class Price</div>
                <div class="col-md-2">{{$class->class_price}}</div>
            </div>

            @if ($class->class_currency)
                <div class="row class-detail">
                    <div class="col-md-4">{{$class->class_currency === 'credits' ? 'Credits' : 'Lei'}}</div>
                </div>
            @endif

            <div class="row class-detail">
                <div class="col-md-3">Require Active Subscription</div>
                <div class="col-md-1">{{$class->require_active_subscription ? 'Yes' : 'No'}}</div>
            </div>

            <div class="row class-detail">
                <div class="col-md-3">Enrolled Students</div>
                <div class="col-md-1">{{$class->enrolled_students}}</div>
            </div>

            @if ($class->allow_online_booking)
                <div class="row class-detail">
                    <div class="col-md-4">
                        <a class="subscribe-to-class" href="{{url( 'subscribe-to-class/' . $class->id )}}">Subscribe to class</a>
                    </div>
                </div>
            @endif

        </div>

    </div>
@endsection

<style>

    .subscribe-to-class{
        color: white;
        font-size: 20px;
    }

    .class-detail{
        padding: 10px;
    }

    .submit-button {
        display: block !important;
        margin-top: 20px;
    }

    .main-content {
        margin: 0 !important;
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
        margin-left: auto !important;
        margin-right: auto !important;
        max-width: 1120px;
        display: block;
        padding: 15px;
    }

    .custom-label {
        display: block;
        position: static;
        margin: 0;
        padding: 0;
        color: #fff;
        font-family: 'Arvo';
        font-size: 16px;
    }

    .input-title {
        display: block;
        width: 300px;
        padding: 15px 0 15px 12px;
        font-family: "Arvo";
        font-weight: 400;
        color: #377D6A;
        background: rgba(0, 0, 0, 0.3);
        border: none;
        outline: none;
        color: #fff;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(0, 0, 0, 0.3);
        border-radius: 4px;
        box-shadow: inset 0 -5px 45px rgba(100, 100, 100, 0.2), 0 1px 1px rgba(255, 255, 255, 0.2);
        text-indent: 60px;
        transition: all .3s ease-in-out;
        position: relative;
        font-size: 13px;
    }

</style>