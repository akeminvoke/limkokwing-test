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
      ````````````````````````````````````
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
      ````````````````````````````````````
      ->$range is range of alphabet ,we use this variable as a indicator to loop the process
      ->$step is variable that we use as a started and the end point of the looping process. It value also will be use to devide by the   variable $a  and this will determine whether the remainder is 0 or higher.
      -> if the remainder is 0 then we replace  $t with a string/alphabet  to it current position of $string starting from A-Z.
      
       ->if the remainder is higher than 0 then we put $step value which is number into  it current position of $string.
       ->lastly we will return the result in json format  back to the front-end.
     

3) Pass the initial_state to the reducer function arguments. Make sure also pass an action argument to accept action from dispatch function ie:

````
      const Reducer = (state = INITIAL_STATE, action) => {

    }
````

4) Inside the reducer function block, define what you want the reducer to happen. You will most likely to work with object.Assign() function. Ie:

````
      const Reducer = (state = INITIAL_STATE, action) => {
          switch(action) {
            case "REDUCER_UPDATE_A": {
                Object.assign({}, state, {a: "Hello World!"})
          }
            case "REDUCER_UPDATE_B": {
                Object.assign({}, state, {b: {f: "New", g: "Day today"}})
          }
        }  
    }
````

5) Export reducer. Ie:

````
        export default Reducer;
````

### Styling

Theres two types of styling you can implement. Also, there is two types of components which is `smart components` and `dumb components` that can implement those styles. Make sure you know what are those components before editting since I wont cover that part in this Documentation.
First, for `smart components`, use this:
- let say you have `<Card/>` components, use `className={classes.styleObject}` to implement styling.
  - `className` is JSX attribute that accept class name.
  - `classes` is created above before `render()` is called. Usually it is called like this `const { classes } = this.props`.
  - `styleObject` is from jss object. It is stored from `assets/jss/views/...`. Make sure you import the style object from the jss folder.
  - Apply the jss accordingly.

Secondly, for `dumb components`, use this:
- As we know, dumb components is not built on class definition, hence it wont inherit class functions like `this` and others. What you can do is:
  - Create `classes` from props: `const { classes } = props`
  - Import the jss folder needed for the file styles.
  - Now, instead of inserting `classes` in `className` tag, put it inside `style` tag. If you insert the jss in `className`, it wont work since it just bring the name of the Object from jss. You can try `console.log()`
  - Instead of doing `classes.styleObject`, do this instead `styleImport.styleObject` at the `style={}` tag.
  - Now, the css will be implemented

## Back-End(Still in progress)
For back-end, it requires several tables.
- `auth`
- `user` -> `Client` and `Admin`
- `client_feedback`
- `client_list`
- `meetings`
- `upload` and `uploaded_letter`
- `bill_statements`

## Relationship
| User           | Type           |
| :------------- | :------------- |
| Client         | User One       |
| Admin          | User Two       |

`client_feedback` belongs to `user`, `user` has many `client_feedback`
`client_list` belongs to `user`, `user` has many `client_list`
`meetings` belongs to `user`, `user` has many `meetings`
`upload` belongs to `client_list`, `client_list` has many `upload`
`bill_statements` belongs to `client_list`, `client_list` has many `bill_statements`

## Tables
Auth:
- `userId` -> id
- `token` -> String
- `tokenExpiration` -> Number

User:  
- `id` -> id
- `name` -> String
- `email` -> String
- `password` -> String
- `companyName` -> String
- `phoneNo` -> String
- `isAdmin` -> Boolean

Content:
- `companyLogo` -> URL to S3
- `facebook` -> String/URL
- `instagram` -> String/URL
- `globe` -> String/URL
- `startDate` -> Date
- `endDate` -> Date
- `infographic` -> Number, not Float, not Double, with limit
- `video` -> URL
- `about` -> String
- `product` -> String
- `user` -> Id (Relate back to User)
- `months` -> Object from Month
- `weeks` -> Object from Week
- `collaterals` -> Object from Collateral
- `documents` -> Object from Document

Month:
- `monthName` -> String
- `monthDescription` -> String
- `user` -> Id (Relate back to User)
- `isProgress` -> Boolean or Number (onGoing, onHold, etc)

Week:
- `weekName` -> String
- `weekDesciption` -> String
- `user` -> Id (Relate back to User)

Collateral:
- `collateralName` -> String
- `collateralDescription` -> String
- `copywriting` -> Boolean
- `content` -> Boolean
- `creative` -> Boolean
- `isPosted` -> Boolean(posted: true, in progress: false)
- `user` -> Id (Relate back to User)

Document:
- `docId` -> Id
- `docName` -> String
- `docDescription` -> String
- `docFiles` -> Files to S3

Report:

Finance:
