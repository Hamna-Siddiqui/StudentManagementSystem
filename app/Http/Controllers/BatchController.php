<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Course;
use Illuminate\View\View;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch batches with pagination
        $batches = Batch::paginate(5); // Adjust pagination as needed

        // Return view with batches
        return view('Batches.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $courses = Course::pluck('name', 'id');
        return view('Batches.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'required|date',
        ]);

        Batch::create($validatedData);

        return redirect('/Batches')->with('flash_message', 'Batch added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $batch = Batch::findOrFail($id);
        return view('Batches.show', compact('batch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $batches = Batch::findOrFail($id);
        $courses = Course::pluck('name', 'id'); // For the dropdown in the form
        return view('Batches.edit', compact('batches', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $batch = Batch::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'required|date',
        ]);

        $batch->update($validatedData);

        return redirect('/Batches')->with('flash_message', 'Batch updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        $batch = Batch::findOrFail($id);
        $batch->delete();

        return redirect('/Batches')->with('flash_message', 'Batch deleted successfully!');
    }
}
