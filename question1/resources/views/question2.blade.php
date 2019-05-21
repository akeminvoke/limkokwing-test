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


<div class="container">


    <form id="question-2">
        @csrf
    <div id="populate">
        <div class="row justify-content-md-center">
            <div class="col-2">
                <label for="exampleFormControlInput1">Name User 0</label>
                <input class="form-control" id="var_a" name="name[]" type="text"  id="exampleFormControlInput1" placeholder="please enter name">
            </div>
            <div class="col-1">
                <label for="exampleFormControlInput1">Age</label>
                <input class="form-control" id="var_b" name="age[]" type="text"  id="exampleFormControlInput1" placeholder="please enter age">
            </div>
            <div class="col-1">
                <label for="exampleFormControlInput1">Key 1</label>
                <input class="form-control" id="var_c" name="key[]" type="text"  id="exampleFormControlInput1" placeholder="place any character">
            </div>
            <div class="col-1">
                <label for="exampleFormControlInput1">Key 2</label>
                <input class="form-control" id="var_c" name="key[]" type="text"  id="exampleFormControlInput1" placeholder="place any character">
            </div>
            <div class="col-1">
                <label for="exampleFormControlInput1">Key 3</label>
                <input class="form-control" id="var_c" name="key[]" type="text"  id="exampleFormControlInput1" placeholder="place any character">
            </div>
            <div class="col-2">
                <label for="exampleFormControlInput1">Country</label>
                <input class="form-control" id="var_c" name="country[]" type="text"  id="exampleFormControlInput1" placeholder="please enter ctry">
            </div>
            <div class="col-2">
                <label for="exampleFormControlInput1">State</label>
                <input class="form-control" id="var_c" name="state[]" type="text"  id="exampleFormControlInput1" placeholder="please enter state">
            </div>
            <div class="col-2">
            <a id="addScnt">Add Another Input Box</a>
            </div>
        </div>
    </div>
        <br>
        <button type="submit" class="btn btn-info">submit</button>
    </form>
        <div class="row">
            <div class="col">
                <label for="exampleFormControlInput1">Result</label>

            </div>
    </div>

        <div class="row">
            <div id="ans" class="col-4 justify-content-md-center">


            </div>
        </div>

        <div class="row justify-content-md-center">
            <div  id="user" class="col-4">

            </div>
        </div>
    <div class="row justify-content-md-center">
            <div id="address" class="col-4">

            </div>
    </div>









</div>

</body>
<script>
    $(function() {
        var scntDiv = $('#populate');
         i = $('#populate').find('#blue').size() + 1;

        $("#addScnt").click(function(){
            $('<div id='+i+' class="row justify-content-md-center">' +

            '<div class="col-2"> ' +
                '<label for="exampleFormControlInput1">Name User '+i+'</label> ' +
                '<input class="form-control" id="var_a" name="name[]" type="text"  id="exampleFormControlInput1" placeholder="name@example.com">' +
                 '</div>' +
                 '<div class="col-1">' +
                 '<label for="exampleFormControlInput1">Age</label> ' +
                    '<input class="form-control" id="var_b" name="age[]" type="text"  id="exampleFormControlInput1" placeholder="name@example.com">' +
                    '.</div> ' +
                    '<div class="col-1"> ' +
                    '<label for="exampleFormControlInput1">Key</label> ' +
                    '<input class="form-control" id="var_c" name="key[]" type="text"  id="exampleFormControlInput1" placeholder="name@example.com">' +
                    '</div> ' +
                    '<div class="col-1"> ' +
                    '<label for="exampleFormControlInput1">Key</label> ' +
                    '<input class="form-control" id="var_c" name="key[]" type="text"  id="exampleFormControlInput1" placeholder="name@example.com">'+
                    '</div> ' +
                    '<div class="col-1"> ' +
                    '<label for="exampleFormControlInput1">Key</label>' +
                    '<input class="form-control" id="var_c" name="key[]" type="text"  id="exampleFormControlInput1" placeholder="name@example.com">' +
                     '</div>'+
                '<div class="col-2"> ' +
                '<label for="exampleFormControlInput1">Country</label>' +
                '<input class="form-control" id="var_c" name="country[]" type="text"  id="exampleFormControlInput1" placeholder="name@example.com">' +
                '</div>'+
                '<div class="col-2"> ' +
                '<label for="exampleFormControlInput1">State</label>' +
                '<input class="form-control" id="var_c" name="state[]" type="text"  id="exampleFormControlInput1" placeholder="name@example.com">' +
                '</div>'+
                '<div class="col-2"> '+
                '<button  onclick="rem('+i+')">Remove</button>'+
                '</div>'+
                '</div>').appendTo(scntDiv);
                     i++;
            return false;
        });


    });


    function rem(s){


            $('#'+s).remove();
            i--;

    }

    {{--$(document).ready(function(){--}}

        {{--$.ajax({--}}
            {{--headers: {--}}
                {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
            {{--},--}}
            {{--type:'get',--}}
            {{--url: '{{route('getresult')}}',--}}
            {{--method: 'GET',--}}

            {{--dataType: "json",--}}
            {{--success:function(data){--}}
                {{--console.log(data);--}}
                {{--var i = 0;--}}

                {{--$.each(data.user, function (i,item) {--}}


                        {{--$('#user').append('<label for="exampleFormControlInput1">user: '+i+'</label> <br> <label for="exampleFormControlInput1">name:</label>'+data.user[i].name+'<br>' +--}}
                        {{--'<label for="exampleFormControlInput1">age :</label>'+data.user[i].age+' <br>'+--}}
                            {{--'<label for="exampleFormControlInput1">key : </label>'+data.user[i].key+'<br>');--}}
                        {{--++i;--}}
            {{--});--}}

                {{--$.each(data.address, function (i,item) {--}}

                    {{--$('#user').append('<label for="exampleFormControlInput1">'+i+'</label> <br> <label for="exampleFormControlInput1">state:</label>'+data.address[i].state+'<br>' +--}}
                        {{--'<label for="exampleFormControlInput1">country :</label>'+data.address[i].country+'<br>')});--}}

        {{--}--}}
    {{--});--}}
    {{--})--}}

    $("#question-2").submit(function(e){
        e.preventDefault();
        var data = $("#question-2").serialize();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url: '{{route('getresult')}}',
            method: 'POST',
            data:data,
            dataType: "json",
            success:function(data){
                console.log(data);
                var i = 0;

                $.each(data.user, function (i,item) {


                    $('#user').append('<label for="exampleFormControlInput1">user: '+i+'</label> <br> <label for="exampleFormControlInput1">name:</label>'+data.user[i].name+'<br>' +
                        '<label for="exampleFormControlInput1">age :</label>'+data.user[i].age+' <br>'+
                        '<label for="exampleFormControlInput1">key : </label>'+data.user[i].key+'<br>');
                    ++i;
                });

                $.each(data.address, function (i,item) {

                    $('#user').append('<label for="exampleFormControlInput1">'+i+'</label> <br> <label for="exampleFormControlInput1">state:</label>'+data.address[i].state+'<br>' +
                        '<label for="exampleFormControlInput1">country :</label>'+data.address[i].country+'<br>')});

            }

        });
    });
</script>

</html>
