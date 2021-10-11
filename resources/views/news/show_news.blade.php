@extends('index')

@section('content')

<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">

        <div>
            <div class="alert_error text-center">
                <h1></h1>
                <ul></ul>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{session()->get('message')[0]['success']}}
                    {{session()->forget('message')}}
                </div>
            @endif
        </div>

        <div class="card-header card-header-warning col-lg-8" style="margin-bottom: 5px;float: right;">
            <h5 class="card-title text-center"><a href="../news">All News</a></h5>
            <h4 class="card-title text-center">News Details</h4>
            <hr>
            <table class="table table-striped list_news">
                <thead>
                    <tr class="text-center">
                        <th>Title</th>
                        <th>Content</th>
                        <th>Add By</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td><h4>{{$news->title}}</h4></td>
                        <td><h5>{{$news->content}}</h5></td>
                        <td><p>{{$news->getUserName()->first()->name}}</p></td>
                    </tr>
                </tbody>
            </table>
            <hr>
            @foreach($news->comments()->get() as $comment)
                <h5>Add By : {{$comment->getUserName()->first()->name}}</h5>
                <h5>Comment : {{$comment->comment}}</h5>
                <hr>
            @endforeach

        </div>

        <div class="col-lg-3.5" style="float: left">

            {!! Form::open(['url'=>'news/' . $news->id]) !!}
            <div class="mb-3">
                {!! Form::label('exampleFormControlInput4','Add Comment',['class'=>'form-label']) !!}
                {!! Form::textarea('comment',old('comment'),['class'=>'form-control','id'=>'exampleFormControlInput4','placeholder'=>'Your Comment']) !!}
            </div>
            <div class="mb-3">
                {!! Form::submit('Add comment',['class'=>'btn btn-primary mb-3','id'=>'add_comment']) !!}
            </div>
            {!! Form::close() !!}

        </div>

    </div>
</div>

@endsection