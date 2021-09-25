<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 10px;
        }
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
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

            {!! Form::open(['url'=>'insert/user']) !!}
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


{{--            <form method="post" action="{{ url('insert/user') }}">--}}
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
            <form method="post" action="{{ url('delete/user') }}">
                <table class="table table-striped">
                    <tr>
                        <th>Id</th>
                        <th>Username</th>
                        <th>Address</th>
                        <th>Age</th>
                        <th>Email</th>
                        <th>Phone</th>
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

                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->age}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{!empty($user->deleted_at)?'Trashed':'Published'}}</td>
                                <td>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="checkbox" name="id[]" value="{{$user->id}}">
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
</body>
</html>
