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
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            $(document).on('click','#add_news',function (){

                var form = $('#news').serialize();
                var url  = $('#news').attr('action');

                $.ajax({

                    url:url,
                    dataType:'json',
                    data:form,
                    type:'post',
                    beforeSend: function (){

                        $('.alert_error h1').empty()
                        $('.alert_error ul').empty()

                    },success: function (data){

                        if (data.status == true){
                            $('.list_news tbody').append(data.result);
                            $('#news')[0].reset();
                        }

                    },error: function (data_error,exception){

                        if (exception == 'error'){

                            $('.alert_error h1').html(data_error.responseJSON.message)
                            var list_error = '';
                            $.each(data_error.responseJSON.errors,function (k,v){
                                list_error += '<li>'+v+'</li>'
                            });

                            $('.alert_error ul').html(list_error)

                        }
                    }
                })
               return false;

            });
        </script>
    </head>
    <body>