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
        <div class="col-lg-4" style="float: left">

            {!! Form::open(['url'=>'insert/news']) !!}
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
                {!! Form::submit('Add New',['class'=>'btn btn-primary mb-3']) !!}
            </div>
            {!! Form::close() !!}

        </div>
        <div class="col-lg-4" style="float: right">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-lg-4" style="float: right">
            @if(session()->has('message'))
            <div class="alert alert-success">
{{--                {{session()->get('message')}}--}}
                {{session()->get('message')[0]['success']}}
                {{session()->forget('message')}}
            </div>
            @endif
        </div>

        <div class="clearfix"></div>

        <hr>

        <div class="card-header card-header-warning col-lg-12" style="margin-bottom: 5px">
            <h4 class="card-title text-center">All Users</h4>
            <form method="post" action="{{ url('delete/news') }}">
                <table class="table table-striped">
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Add By</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Deleted Status</th>
                        <th>Select</th>
                    </tr>

                    @foreach($news as $new)
                        <tr>
                            <td>{{$new->id}}</td>
                            <td>{{$new->title}}</td>
                            <td>{{$new->desc}}</td>
                            <td>{{$new->getUserName()->first()->name}}</td>
                            <td>{{$new->content}}</td>
                            <td>{{$new->status}}</td>
                            <td>{{!empty($new->deleted_at)?'Trashed':'Published'}}</td>
                            <td>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="checkbox" name="id[]" value="{{$new->id}}">
                            </td>
                        </tr>
                    @endforeach
                </table>
                <hr>
                <input type="submit" name="delete" value="Soft Delete">
                <input type="submit" name="restore" value="Restore">
                <input type="submit" name="forcedelete" value="Force Delete">
            </form>
        </div>

        <nav aria-label="...">
            <ul class="pagination">
                {!! $news->render() !!}
            </ul>
        </nav>
    </div>
</div>

@endsection