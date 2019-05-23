# limkokwing-interview test
This is sample code which are represents the answers of four interview questions. Each question have a module/function  which can be run/test by inserting the value inside the form fields  that has been provided.

## Quick start

To start with this project

- `git clone <this project git link. Copy from above>`
- `open up the terminal/cmd`
- `go to application root folder`
- `type composer update`
- `once it done ,open env file and put your database name,username ,and password then at the terminal run "php artisan migrate" and    this will create a few table which has been define at migration file ` 

## Documentation
### Question 1 Technical explanation

  Below are the explanation of how the awnser for question 1  sample code work 

a) front-end
   ->this module use ajax feature in order to send a request to the back-end.
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
    -> as you can see we are using CSRF token inside the header the purpose is to use user-specific token in all form submissions              and side-effect URLs to prevent Cross-Site Request Forgeries.
    -> we are using the 'POST' method and send the request with json type
    -> success property(which is apart of ajax property) will receive a respons from the api and allocate those repons back into              selected div. In this case we display the anwser in ' $("#ans").html(data.result)';
    
    b) back-end
      ->function for this module can be found in Question1 Controller.
      -> all the request must be declare first. In this case i declare request value  inside  $a for variable A , $b for variable B,             and $c for variable C.
      ->below is how does the function look like
      `````````````````````````````````````````````````````````````````
     public function getresult(Request $request)
    {
        $a= $request->var_a;
        $b= $request->var_b;
        $c= $request->var_c;

        $range=range('A', 'Z');
        $step = 0;
        $t=0;
        
        $string[] = '';
        for($step=0;$step<= $c;$step += $b){
            if(end($string)){
                $t = 0;
            }
            if($step%$a == 0){
                $string[] .= $range[$t];
                $t++;
            }
            else {
                $string[] .= $step;
            }
        }
        return response()->json(['result' => $string]);
    }
}
      ````````````````````````````````````````````````````````````````````````````````````````````````````````````````````````````
       ->$range  variable is range of alphabet, we use this variable as a indicator to loop the process
       ->for the first the step of the loop it will check if the character "Z" is exist at the end of array index or not.IF TRUE then            we set the $t to zero .this will give $range value start  from A again.
       ->$step is a variable that we use as a starting and the end point of the looping process. This value also will be use to be              devide by the variable of $a  and this will determine whether the remainder is 0 or higher.
       ->If the remainder is 0 then we replace  $string with a $t which starting from A-Z.
       ->If the remainder is higher than 0 then we put $step value into it current position of $string which sitring.
       ->Lastly we will return the result in json format  back to the front-end.
  ----------------------------------------------------------------------------------------------------------------------------------     
       ### Question 2 Technical explanation
       
       Below are the explanation of how the awnser for question 2  sample code work 
       
       a) Front -end
         ->for the front-end part I provide a scalable input fields which giving an option for user to add the details as many as they            like.
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
     -> var i is global variable that we use to access in " $("#addScnt").click(function()" as to indicate users index
      ->once the users click #addScnt div then this function will execute and append a new fields inside #populate div.
      ->if the user want to remove additional field that already has been added, users can click  remove button and this will heat function rem(s) and this will remove selected field.
      `````````````````````````````````````````````````````````````````````````````````````````````
       function rem(s){

            $('#'+s).remove();
            i--;

    }
    ````````````````````````````````````````````````````````````````````````````````````````````````
      -> everytime when the user click the button remove, user index will decrease by one. so this will give a true a number of how                many input does the user typein.
         
         b)Back end
         ->for the back end part I used the the number of name to loop the process since the number of name can be represent as a index               of array for each users .
         ->hence whenever the loop is running then  $name index can be use to accees another array. In this case i used the NAME index            to find corelated age.
       
         
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
           ->To find the value of the 'key' I used  'array_slice' function  to select for particular key array. For instace ,in this              case i use an $i as a starting point of the selected array as i would to be selected. Then i put '3' indicate as which                  position that i would like to take into an array.I choose 3 because we have maximum 3 input box for key ,if we have more                 than 3 then we can put more than that. 
           ->I use the same method to structure country and state array.in these case i use country to loop and  use the index to                    access another array.
           ->once everything is done then we retrun  user and address array in json format.
           -----------------------------------------------------------------------------------------------------------------------
           question 3
           -> answer for question 3 as below
           -> "select a.name,c.freq  from  clients a inner join (select b.user_id,count(*) as freq from orders b group by  b.user_id)c
              on a.id = c.user_id"
           
           -----------------------------------------------------------------------------------------------------------------------
      Question 4
       In this part i would like to focus more on crud process ,security ,as well as validation control mechanissm.
       
       A)  introduction
          ->this module consist of create ,read ,update ,and delete function.
          ->in this function i use laravel resource default methodto handle a variety of actions on the resource. The generated                     controller will already have methods stubbed for each of these actions, including notes informing you of the HTTP verbs and             URIs they handle.
          ->below is how i define route using resourse method operation 
             ``````````````````````````````
             Route::resource('crud','CrudsController');
             ``````````````````````````````
             ->if you like to know the detail of every existing route that you have in your project ,you can simply type "php artisan                 route:list". in terminal.
          
         B)  validation control 
             front-end validation control
           ->for the front end form validation , i used parsley.js in order to control the validation for every single field inside the              form
           ->the validation also include require , date-format,numeric and phone-number format.
           ->below is a parsely attribute to be put insde input element for it to work.
            ``````````````````````````````
             data-parsley-required 
             ````````````````````````````
             back-end validation control
           ->using a laravel default validation in order to control back-end validation
           ->we can put this validation inside middle if want to. But in example i put inside the controller so we can easily work on                it. below is how we define validation for particular request.
           ``````````````````````````````````````````````
           
        $request->validate([
            'student_name'    =>  'required',
            'date_of_birth'           =>  'required|date',
            'nationality'     =>  'required',
            'phone'           =>  'required',
            'image'           =>  'required|image|max:2048'
        ]);
        ```````````````````````````````````````````````````
      C)  CRUD PROCESS
        create method
        -> once we the request has been validate from the front as well as the back-end now its turn for the create method to take over            the process.
        ->to save it into the table its good to have a model for a particular table first.in this case i neame the model 'crud' and use            this model to do crud operation.
        - > below is how do i delcare crud model and use it to save data.
        ``````````````````````````````````````````````````````````````````
        use App\Students;
          public function store(Request $request)
    {
        $request->validate([
            'student_name'    =>  'required',
            'date_of_birth'           =>  'required|date',
            'nationality'     =>  'required',
            'phone'           =>  'required',
            'image'           =>  'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'student_name'     =>         $request->student_name,
            'date_of_birth'    =>         $request->date_of_birth,
            'nationality'      =>         $request->nationality,
            'phone'            =>         $request->phone,
            'image'            =>         $new_name
        );
//dd( $form_data);
        Students::create($form_data);

        return redirect('crud')->with('success', 'Data Added successfully.');
    }
    ```````````````````````````````````````````````````````````````````````````````````````````````````````
    update operation
    ->Same goes to update operation ,we need to make a validation first then pass it to the controller to update selected row.
    ->to update for particular data we need to use method post or patch and we need to pass an ID that represent which row that would         like to update.below is the example of how we define a route inside form element .
    ``````````````````````````````````````````````````````````````````````````````````````````````````
    <form	method="post" action="{{ route('crud.update', $data->id) }}" enctype="multipart/form-data">
    ``````````````````````````````````````````````````````````````````````````````````````````````````
    Delete operation
    ->Delete operation use a GeT method.
    ->in this case we use soft delete approach which mean we are not really delete it but we mark a date inside deleted at column.
    -below is how we make delete function code
    ```````````````````````````````````````````````````````````````````````````````````````````````````````
      public function destroy($id)
    {
        $data = Students::findOrFail($id);
        $data->delete();
        return redirect('crud')->with('success', 'Data is successfully deleted');
    }
    ```````````````````````````````````````````````````````````````````````````````````````````````````````````````
    
    D) security aspect.
    
     ->  define a column name as a Fillable inside a model.this will allow data to be save if only if the name of the parameter request            same as define in a Fillable.
        ``````````````````````````````````````````````````````````````````````````````````````````
        protected $fillable = ['student_name', 'phone', 'date_of_birth','image','nationality'];
        ``````````````````````````````````````````````````````````````````````````````````````````
  
    CSRF.
    ->   use " \App\Http\Middleware\VerifyCsrfToken::class," for every incoming post method request.
    
    Styling approach
     ->using bootrap  4.1.0 to customive layout design.
    
     ->using Blade feature such as yield and extend function to structure the design layout.
     
     ->use customize css file which cab be found in public/css/app.css.
    
    
    
    
    
    
        
        
             
