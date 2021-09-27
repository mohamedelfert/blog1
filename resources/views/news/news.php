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
                {!! Form::label('exampleFormControlInput1','UserName',['class'=>'form-label']) !!}
                {!! Form::text('username',old('username'),['class'=>'form-control','id'=>'exampleFormControlInput1','placeholder'=>'Your Name']) !!}
            </div>
                {!! Form::label('exampleFormControlInput2','Your Address',['class'=>'form-label']) !!}
                {!! Form::text('address',old('address'),['class'=>'form-control','id'=>'exampleFormControlInput2','placeholder'=>'Your Address']) !!}
            <div class="mb-3">
                {!! Form::label('exampleFormControlInput3','Age',['class'=>'form-label']) !!}
                {!! Form::number('age',old('age'),['class'=>'form-control','id'=>'exampleFormControlInput3','placeholder'=>'Your Age']) !!}
            </div>
                {!! Form::label('exampleFormControlInput4','email',['class'=>'form-label']) !!}
                {!! Form::email('email',old('email'),['class'=>'form-control','id'=>'exampleFormControlInput4','placeholder'=>'Your Email']) !!}
            <div class="mb-3">
                {!! Form::label('exampleFormControlInput5','Phone',['class'=>'form-label']) !!}
                {!! Form::text('phone',old('phone'),['class'=>'form-control','id'=>'exampleFormControlInput5','placeholder'=>'Your Phone']) !!}
            </div>
            <div class="mb-3">
                {!! Form::submit('Add New',['class'=>'btn btn-primary mb-3']) !!}
            </div>
            {!! Form::close() !!}


{{--            <form method="post" action="{{ url('insert/news') }}">--}}
{{--                <input type="hidden" name="_token" value="{{csrf_token()}}">--}}
{{--                <div class="mb-3">--}}
{{--                    <label for="exampleFormControlInput1" class="form-label">UserName</label>--}}
{{--                    <input type="text" class="form-control" name="username" value="{{old('username')}}" id="exampleFormControlInput1" placeholder="Your Name">--}}
{{--                </div>--}}
{{--                <div class="mb-3">--}}
{{--                    <label for="exampleFormControlInput2" class="form-label">Your address</label>--}}
{{--                    <input type="text" class="form-control" name="address" value="{{old('address')}}" id="exampleFormControlInput2" placeholder="Your Address">--}}
{{--                </div>--}}
{{--                <div class="mb-3">--}}
{{--                    <label for="exampleFormControlInput3" class="form-label">Your Age</label>--}}
{{--                    <input type="number" class="form-control" name="age" value="{{old('age')}}" id="exampleFormControlInput3" placeholder="Your Age">--}}
{{--                </div>--}}
{{--                <div class="mb-3">--}}
{{--                    <label for="exampleFormControlInput4" class="form-label">Email address</label>--}}
{{--                    <input type="email" class="form-control" name="email" value="{{old('email')}}" id="exampleFormControlInput4" placeholder="Your Email">--}}
{{--                </div>--}}
{{--                <div class="mb-3">--}}
{{--                    <label for="exampleFormControlInput5" class="form-label">Phone Number</label>--}}
{{--                    <input type="text" class="form-control" name="phone" value="{{old('phone')}}" id="exampleFormControlInput5" placeholder="Your Phone">--}}
{{--                </div>--}}
{{--                <div class="col-auto">--}}
{{--                    <button type="submit" class="btn btn-primary mb-3">Add New</button>--}}
{{--                </div>--}}
{{--            </form>--}}

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
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Add By</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Select</th>
                    </tr>
        {{--            @foreach($users as $user)--}}
        {{--                <tr>--}}
        {{--                    <td>{{$user->id}}</td>--}}
        {{--                    <td>{{$user->username}}</td>--}}
        {{--                    <td>{{$user->address}}</td>--}}
        {{--                    <td>{{$user->age}}</td>--}}
        {{--                    <td>{{$user->email}}</td>--}}
        {{--                    <td>{{$user->phone}}</td>--}}
        {{--                    <td>--}}
        {{--                        <form method="post" action="{{ url('delete/user/' . $user->id) }}">--}}
        {{--                            <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
        {{--                            <input type="hidden" name="_method" value="DELETE">--}}
        {{--                            <input type="submit" value="Delete User">--}}
        {{--                        </form>--}}
        {{--                    </td>--}}
        {{--                </tr>--}}
        {{--            @endforeach--}}

                        @foreach($news as $new)
                            <tr>
                                <td>{{$new->id}}</td>
                                <td>{{$new->title}}</td>
                                <td>{{$new->desc}}</td>
                                <td>{{$new->add_by}}</td>
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
                {!! $users->render() !!}
            </ul>
        </nav>
    </div>
</div>

@endsection