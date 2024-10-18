<?php

namespace App\Http\Controllers;


use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Student;
use Illuminate\View\View;
use App\Http\Requests\StoreUserRequest;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch students with pagination
        $students = Student::paginate(5); // 10 students per page, you can adjust this number
    
        // Return view with students
        return view('Students.index', compact('students'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create() :view
    {
        return view('Students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'mobile' => 'required|string|max:11',
        'e_mail' => 'required|email|max:255',
    ]);
    Student::create($validatedData);

    return redirect('/Students')->with('flash_message', 'Student added successfully!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id) :view
    {
        $Students= Student::find($id);
        return view('Students.show')->with('Students', $Students);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) :view
    {
        $Students= Student::find($id);
        return view('Students.edit')->with('Students', $Students);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $Students= Student::find($id);
        $input= $request->all();
        $Students->update($input);
        return redirect('Students')->with('flash_message', 'Student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) :RedirectResponse
    {
        Student::destroy($id);
        return redirect('Students')->with('flash_message', 'Student Deleted!');
    }
}
