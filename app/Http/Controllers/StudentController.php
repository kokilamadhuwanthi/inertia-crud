<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Student; // Import the Student model
use Illuminate\Support\Facades\Redirect;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('index',[
          'students'=>Student::all()->map(function($student){
                return [
                    'id'=>$student->id,
                    'name'=>$student->name,
                    

                ];
          })
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return Inertia::render('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'required|max:255',
            'age'=>'required|max:3|min:1',
            'status'=>'required',
        ]);

        Student::create($validated);

        return Redirect::route('students.index')->with('message','Student created succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return Inertia::render('edit',[
            'student'=>$student
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validated=$request->validate([
            'name'=>'required',
            'age'=>'required',
            'status'=>'required',
        ]);
        $student->update($validated);

        return Redirect::route('students.index')->with('message','Student edited succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
       
        $student->delete();
        return Redirect::route('students.index')->with('message','Student deleted succesfully');
    }
}
