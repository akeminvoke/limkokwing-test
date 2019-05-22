<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;






class Question1 extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

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
            else {
                $string .= $step;

            }
        }

        return response()->json(['result' => $string]);


    }
}
