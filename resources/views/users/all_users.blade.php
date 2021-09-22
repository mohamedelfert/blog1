<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
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

        .m-b-md {
            margin-bottom: 30px;
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
        <form method="post" action="{{ url('insert/user') }}">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="text" name="username" placeholder="UserName">
            <input type="text" name="address" placeholder="Address">
            <input type="number" name="age" placeholder="Age">
            <input type="email" name="email" placeholder="Email">
            <input type="text" name="phone" placeholder="Phone">
            <input type="submit" name="send" value="Send">
        </form>
        <table>
            <tr>
                <th>Id</th>
                <th>Username</th>
                <th>Address</th>
                <th>Age</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Action</th>
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
            <form method="post" action="{{ url('delete/user') }}">
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->address}}</td>
                        <td>{{$user->age}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="checkbox" name="id[]" value="{{$user->id}}">
                        </td>
                    </tr>
                @endforeach
                <input type="submit" value="Delete All Checked User">
            </form>
        </table>
        {!! $users->render() !!}}
    </div>
</div>
</body>
</html>
