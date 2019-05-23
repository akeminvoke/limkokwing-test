@extends('layout/layout')

@section('content')



    <div class="container">
        <div class="row">
            <div align="left">
                <h1>Question 3</h1>

            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="exampleFormControlInput1"><h2>Answer :</h2></label>

            </div>
        </div>
        <div class="row">
            <div id="ans">
                <div class="row justify-content-md-center">
                    <div class="col-12">
                        <h1>select a.name, c.freq  from  clients a inner join <br>
                            (select b.user_id,count(*) as freq from orders b group by  b.user_id)c
                            on a.id = c.user_id</h1>>

                    </div>

                </div>
            </div>
            <br>
        </div>














    </div>





@endsection
