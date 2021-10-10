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

        <div class="col-lg-3.5" style="float: left">

            {!! Form::open(['url'=>'insert/news','id'=>'news']) !!}
            <div class="mb-3">
                {!! Form::label('exampleFormControlInput1','News Title',['class'=>'form-label']) !!}
                {!! Form::text('title',old('title'),['class'=>'form-control','id'=>'exampleFormControlInput1','placeholder'=>'News Title']) !!}
            </div>
                {!! Form::label('exampleFormControlInput2','News Description',['class'=>'form-label']) !!}
                {!! Form::text('desc',old('desc'),['class'=>'form-control','id'=>'exampleFormControlInput2','placeholder'=>'News Description']) !!}
            <div class="mb-3">
                {!! Form::label('exampleFormControlInput3','Add By',['class'=>'form-label']) !!}
                {!! Form::number('add_by',old('add_by'),['class'=>'form-control','id'=>'exampleFormControlInput3','placeholder'=>'Add By']) !!}
            </div>
                {!! Form::label('exampleFormControlInput4','News Content',['class'=>'form-label']) !!}
                {!! Form::textarea('content',old('content'),['class'=>'form-control','id'=>'exampleFormControlInput4','placeholder'=>'News Content']) !!}
            <div class="mb-3">
                {!! Form::label('exampleFormControlInput5','status',['class'=>'form-label']) !!}
                {!! Form::select('status',['active'=>'active','pending'=>'pending','dactive'=>'dactive'],old('status'),['class'=>'form-control','id'=>'exampleFormControlInput5','placeholder'=>'select status']) !!}
            </div>
            <div class="mb-3">
                {!! Form::submit('Add New',['class'=>'btn btn-primary mb-3','id'=>'add_news']) !!}
            </div>
            {!! Form::close() !!}

        </div>

        <div class="card-header card-header-warning col-lg-8" style="margin-bottom: 5px;float: right;">
            <h4 class="card-title text-center">All News</h4>
            <form method="post" action="{{ url('delete/news') }}">
                <table class="table table-striped list_news">
                    <thead>
                        <tr class="text-center">
                            <th>Id</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Add By</th>
                            <th>Content</th>
                            <th>Status</th>
                            <th>Deleted Status</th>
                            <th>Select</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($all_news as $news)
                        @include('news.row_news')
                        @endforeach
                    </tbody>
                </table>
                <hr>
                <input type="submit" name="delete" value="Soft Delete">
                <input type="submit" name="restore" value="Restore">
                <input type="submit" name="forcedelete" value="Force Delete">
            </form>
        </div>

        <nav aria-label="...">
            <ul class="pagination">
                {!! $all_news->render() !!}
            </ul>
        </nav>
    </div>
</div>

@endsection