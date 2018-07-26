@extends('layouts.app')

@section('content')
    <div class="main-content">

        <h1>Add a new class!</h1>


        {{--{{ Form::open(array('url' => 'handle-add-class'))  }}--}}

        <?php echo Form::open(['route' => 'user.preferences.update']) ?>

        {{ Form::label('clas_title', 'Class Title') }}
        {{ Form::input('text', 'class_title', '', ['class' => 'input-title']) }}
        {{ Form::input('date', 'class_date', '', ['class' => 'input-title']) }}
        {{ Form::input('time', 'class_time', '', ['class' => 'input-title']) }}

        {{ Form::submit('Submit!')  }}

        {{ Form::close() }}

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
</style>