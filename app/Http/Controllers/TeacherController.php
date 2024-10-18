<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Teacher;
use Illuminate\View\View;



class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :view
    {
         // Fetch students with pagination
         $teachers = Teacher::paginate(5); // 10 students per page, you can adjust this number
    
         // Return view with students
         return view('Teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :view
    {
        return view('Teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {$validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'mobile' => 'required|string|max:11',
        'e_mail' => 'required|email|max:255',
    ]);
    Teacher::create($validatedData);

    return redirect('/Teachers')->with('flash_message', 'Teacher added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) :view
    {
        $Teachers= Teacher::find($id);
        return view('Teachers.show')->with('Teachers', $Teachers);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) :view
    {
        $Teachers= Teacher::find($id);
        return view('Teachers.edit')->with('Teachers', $Teachers);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $Teachers= Teacher::find($id);
        $input= $request->all();
        $Teachers->update($input);
        return redirect('Teachers')->with('flash_message', 'Teacher Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) :RedirectResponse
    {
        Teacher::destroy($id);
        return redirect('Teachers')->with('flash_message', 'Teacher Deleted!');
    }
}
