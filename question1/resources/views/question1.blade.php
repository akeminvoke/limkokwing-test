<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>
        /*
    DEMO STYLE


    </style>
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>interview assessment</h3>
            </div>

            <ul class="list-unstyled components">

                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Question</a>
                    <ul class="list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Question 1</a>
                        </li>
                        <li>
                            <a href="{!! url('/question2') !!}" >Question 2</a>
                        </li>
                        <li>
                            <a href="#">question 3</a>
                        </li>
                        <li>
                            <a href="{!! url('/crud') !!}" >Question 4</a>
                        </li>
                    </ul>
                </li>
                <!-- <li>
                    <a href="#">About</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li> -->


            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light">


                <button type="button" id="sidebarCollapse" class="navbar-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-times"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                </div>

            </nav>

            <div class="container-fluid">
                
                <div class="row justify-content-center">
                    <div class="col-md-11">
                        <h2>Question 1</h2>
                        <br>
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
                </div>



            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>
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
</body>

</html>