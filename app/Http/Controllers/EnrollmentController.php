<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Enrollment;
use App\Models\Batch;
use App\Models\Student;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch enrollments with pagination
        $enrollments = Enrollment::paginate(5); // 5 enrollments per page, you can adjust this number

        // Return view with enrollments
        return view('Enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() 
    {
        $batches = Batch::pluck('name', 'id');
        $students = Student::pluck('name', 'id');
        return view('enrollments.create', compact('batches', 'students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'enroll_no' => 'required|string|max:255',
            'batch_id' => 'required|string|max:255',
            'student_id' => 'required|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric|min:0',
        ]);
        Enrollment::create($validatedData);

        return redirect('/Enrollments')->with('flash_message', 'Enrollment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) 
    {
        $enrollment = Enrollment::find($id);
        return view('Enrollments.show')->with('enrollment', $enrollment);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) 
    {
        $enrollment = Enrollment::find($id);
        
        // Fetch batches and students for the select dropdowns
        $batches = Batch::pluck('name', 'id');
        $students = Student::pluck('name', 'id');
        
        return view('Enrollments.edit', compact('enrollment', 'batches', 'students'));
    }
    

    /**
     * Update the specified resource in storage.
     */
  /**
 * Update the specified resource in storage.
 */
public function update(Request $request, string $id) 
{
    $validatedData = $request->validate([
        'enroll_no' => 'required|string|max:255',
        'batch_id' => 'required|exists:batches,id',
        'student_id' => 'required|exists:students,id',
        'join_date' => 'required|date',
        'fee' => 'required|numeric|min:0',
    ]);

    $enrollment = Enrollment::findOrFail($id); // Use findOrFail to handle missing records
    $enrollment->update($validatedData);
    
    return redirect('Enrollments')->with('flash_message', 'Enrollment Updated!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) 
    {
        Enrollment::destroy($id);
        return redirect('Enrollments')->with('flash_message', 'Enrollment Deleted!');
    }
}
