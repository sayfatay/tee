<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //a
        // $data = Student::latest()->paginate(5);
        // $data = Student::first()->paginate(5);
        //  return view('Student.index', compact('data'))
        //  ->with('i',(request()->input('page',1) -1 ) *5 );
        // return view('student');

        $data = Student::first()->paginate(15);
        return view('student.index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // // dd($request->all());    
    // $request->validate([
    //             'title'=>'requirde',
    //             'description'=>'required'
    //         ]);

    // Student::create($request->all());

    // return redirect()->route('student.index')
    //                 ->with('success','Student created successfully.');
        
    // }
    public function store(Request $request)
    {
        //
        $request->validate([
            'main_id'=> 'required',
            'fname'=> 'required',
            'lname'=> 'required',
            'subject'=> 'required',
            'score'=> 'required',
            'grade'=> 'required',
        ]);
        Student::create($request->all());
     
        return redirect()->route('student.index')
                        ->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        return view('student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        return view('student.grade',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        $request->validate([
            'main_id'=> 'required',
            'fname'=> 'required',
            'lname'=> 'required',
            'subject'=> 'required',
            'score'=> 'required',
            'grade'=> 'required'
            
        ]);
        $student->update($request->all());
        return redirect()->route('student.index')->with('success','Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return redirect()->route('student.index')->with('success','Student deleted succcessfully.');
    }
}
