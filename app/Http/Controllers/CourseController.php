<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function index(): View
    {
        $courses = Course::paginate(5); // Adjust the pagination as needed
        return view('Courses.index', compact('courses'));
    }

    public function create(): View
    {
        return view('Courses.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'syllabus' => 'required|string|max:500',
            'duration' => 'required|integer|min:1',
        ]);

        Course::create($validatedData);
        return redirect('/Courses')->with('flash_message', 'Course added successfully!');
    }

    public function show(string $id): View
    {
        $course = Course::findOrFail($id);
        return view('Courses.show', compact('course'));
    }

    public function edit(string $id): View
    {
        $course = Course::findOrFail($id);
        return view('Courses.edit', compact('course'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $course = Course::findOrFail($id);
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'syllabus' => 'required|string|max:500',
            'duration' => 'required|integer|min:1',
        ]);

        $course->fill($validatedData)->save();
        return redirect('Courses')->with('flash_message', 'Course Updated!');
    }

    public function destroy(string $id): RedirectResponse
    {
        Course::destroy($id);
        return redirect('Courses')->with('flash_message', 'Course Deleted!');
    }
}
