<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .row {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -15px;
                margin-left: -15px;
                margin-top: 51px;
            }

            .full-height {
                height: 100vh;
            }

            p {
                left: 248px;
                bottom: 35rem;
                position: absolute;
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
                font-size: 13px;
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


                <div class="container ">
                    <form id="question-1">
                        @csrf
                    <div class="row justify-content-md-center">
                        <div class="col-4">
                            <label for="exampleFormControlInput1">Variable A</label>
                            <input class="form-control" id="var_a" name="var_a" type="text"  id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="col-4">
                            <label for="exampleFormControlInput1">Variable B</label>
                            <input class="form-control" id="var_b" name="var_b" type="text"  id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        <div class="col-4">
                            <label for="exampleFormControlInput1">Variable C</label>
                            <input class="form-control" id="var_c" name="var_c" type="text"  id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>

                        <div class="row  justify-content-md-end">
                            <div class="col-12">
                                <label for="exampleFormControlInput1">Result</label>

                            </div>
                        </div>

                        <div class="row  justify-content-md-center">
                            <div id="ans" class="col-4 justify-content-md-center">
                             dsdedsd

                            </div>
                        </div>

                        <div class="row  justify-content-md-end">

                                <button type="submit" class="btn btn-info">submit</button>


                        </div>


                    </form>
        </div>

    </body>
<script>
    $("#question-1").submit(function(e){
        e.preventDefault();
        var data = $("#question-1").serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url: '{{route('question1')}}',
            method: 'POST',
            data:data,
            dataType: "json",
            success:function(data){
               console.log(data)
                    $("#ans").html(data.result);


            }

        });
    });
    </script>

</html>
