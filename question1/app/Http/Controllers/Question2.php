<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;






class Question2 extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function getresult(Request $request)
    {

        $i=1;
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