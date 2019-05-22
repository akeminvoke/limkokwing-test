<?php

namespace App\Http\Controllers;

use App\Students;
use Illuminate\Http\Request;

class CrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Students::latest()->paginate(5);
        return view('index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            'date_of_birth'            =>         $request->date_of_birth,
            'nationality'      =>         $request->nationality,
            'phone'            =>         $request->phone,
            'image'            =>         $new_name
        );
//dd( $form_data);
        Students::create($form_data);

        return redirect('crud')->with('success', 'Data Added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Students::findOrFail($id);
        return view('view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Students::findOrFail($id);
        return view('edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'student_name'    =>  'required',
                'date_of_birth'   =>  'required|date',
                'nationality'     =>  'required',
                'phone'           =>  'required',
                'image'           =>  'required|image|max:2048'
            ]);
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'student_name'    =>  'required',
                'date_of_birth'   =>  'required|date',
                'nationality'     =>  'required',
                'phone'           =>  'required',
            ]);
        }

        $form_data = array(
            'student_name'  =>  $request->student_name,
            'date_of_birth' =>  $request->date_of_birth,
            'image'         =>  $image_name,
            'nationality'   =>  $request->nationality,
            'phone'         =>  $request->phone,
        );

        Students::whereId($id)->update($form_data);
        return redirect('crud')->with('success', 'Data is successfully updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Students::findOrFail($id);
        $data->delete();
        return redirect('crud')->with('success', 'Data is successfully deleted');
    }
}
