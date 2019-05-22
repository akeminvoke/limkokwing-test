# limkokwing-test
This is sample code which are represents of the answers for four interview questions. Each question have a module/function  which can be run/test by inserting the value inside the form fields  that has been provided.

## Quick start

To start with this project

- `git clone <this project git link. Copy from above>`
- `open up the terminal/cmd`
- `go to application root folder`
- `type composer update`
- `once it done ,open env file and put your database name,username ,and password then at the terminal run "php artisan migrate" and    this will create a few table which has been define at migration file ` 

## Documentation
### Question 1 Technical explanation

below are the explanation of how the sample code for the question 1 work 

a) front-end
   ->this module use ajax feature in order send a request to the back-end.
   ````
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
    ````
    ->this ajax can be found in question1.blade.php
    -> as you can see we are using CSRF token the purpose is it will use user-specific token in all form submissions and side-effect        URLs to prevent Cross-Site Request Forgeries
    -> we are using the method 'POST' and send the request with json type
    -> success property(which is apart of ajax property) will receive a respons from the api and allocate those repons back into    selected div. in this case we allocatate the anwser in  ' $("#ans").html(data.result)';
    
    b) back-end
      ->function for this module can be found in Question1 Controller.
      -> all the request declare inside  $a for variable A , $b for variable B, and $c for variable C
      ->below is structure of the function
      `````````````````````````````````````````````````````````````````
      public function getresult(Request $request)
    {
        $a= $request->var_a;
        $b= $request->var_b;
        $c= $request->var_c;

        $range=range('A', 'Z');
        $step = 0;
        $t=0;

        $string = '';
        for($step=0;$step<= $c;$step += $b){

            if($step%$a == 0){
                $string .= $range[$t];
                $t++;
            }
           
                $string .= $step;
      
        }

        return response()->json(['result' => $string]);
    }
}
      ```````````````````````````````````````````````````````````````````
       ->$range is range of alphabet ,we use this variable as a indicator to loop the process
       ->$step is variable that we use as a started and the end point of the looping process.this value also will be use to devide by            the variable of $a  and this will determine whether the remainder is 0 or higher.
       -> if the remainder is 0 then we replace  $t with a string/alphabet  to it current position of $string starting from A-Z.
      
       ->if the remainder is higher than 0 then we put $step value which is number into  it current position of $string.
       ->lastly we will return the result in json format  back to the front-end.
  ----------------------------------------------------------------------------------------------------------------------------------     
       ### Question 2 Technical explanation
       
       below are the explanation of how the sample code for the question 2 work 
       a) front -end
         ->for the front-end part I provide a scalable input fields which giving an option for user add the details as many as they               want.
         ->below is the example of sample code that make add input field feature work
       ``````````````````````````````````````````````````````````````````````````````````````
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
                    '<input class="form-control" id="var_b" name="age[]" type="text"  id="exampleFormControlInput1" placeholder="name@example.com">').appendTo(scntDiv);
                     i++;
            return false;
        });
    });
       
       ````````````````````````````````````````````````````````````````````````````````````````
     -> var i is global variable that use to access in " $("#addScnt").click(function()" as to indicate users index
      ->once the users click #addScnt div then this function will execute and append a new fields inside #populate div.
      ->if the user want to remove additional field that already has been add .users can click  remove button and this will heat function rem(s) and this will remove selected field.
      `````````````````````````````````````````````````````````````````````````````````````````````
       function rem(s){

            $('#'+s).remove();
            i--;

    }
    ````````````````````````````````````````````````````````````````````````````````````````````````
      -> everytime when the user click the button remove, user index will decrease by one. so this will give a true a number of how many input does the user typein.
         
         b)Back end
         ->for the back end part I used the the number of name to loop the process since the number of name can be represent an index               of array for each users .
         ->hence everytime the loop is running then  $name index can be use to accees another array . in this case i use the NAME index            to find corelated age.
       
         
         ````````````````````````````````````````````````````````````````````````````````````````````````
          public function getresult(Request $request)
    {

        $name = $request->input('name');
        $age = $request->input('age');
        $key = $request->input('key');
        $country = $request->input('country');
        $state = $request->input('state');

       $i=0;
        foreach($name as $index => $input) {

                $user[] = array('name' => $input, 'age' => $age[$index], 'key' => array_slice($key,$i,3));
           $i+=3;
        }
        foreach($country as $index => $input) {
            $address[] = array('country' => $input, 'state' => $state[$index]);
        }
        return response()->json(['user'=>$user,'address'=>$address]);
    }
}
         ``````````````````````````````````````````````````````````````````````````````````````````````````````
           ->to find the value of the 'key' I used  'array_slice' function  to select particular key array .for in this case
           i use an $i as a starting point of the selected array that i would like to cut then i put '3' as a how many position that i             would like to take into an array. i choose 3 because we have maximum 3 input box for key ,if we have more than 3 then we               can put more than that. 
           ->I use the same method to structure country and state array.in these case i use country to loop and  use the index to                    access another array.
           ->once everything is done then we retrun  user and address array in json format.
      

