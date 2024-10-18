<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Adjust authorization as needed
    }

    public function rules()
    {
        return [
            // Student Fields
            'student_name' => 'required|string|max:255',
            'student_address' => 'required|string|max:500',
            'student_mobile' => 'required|digits:10',
            'student_email' => 'required|email|unique:students,email',

            // Teacher Fields
            'teacher_name' => 'required|string|max:255',
            'teacher_address' => 'required|string|max:500',
            'teacher_mobile' => 'required|digits:10',
            'teacher_email' => 'required|email|unique:teachers,email',

            // Course Fields
            'course_name' => 'required|string|max:255',
            'syllabus' => 'required|string|max:500',
            'duration' => 'required|integer|min:1',

            // Batch Fields
            'batch_name' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'start_date' => 'required|date',

            // Enrollment Fields
            'enroll_no' => 'required|string|max:255',
            'batch' => 'required|string|max:255',
            'student_id' => 'required|exists:students,id',
            'join_date' => 'required|date',
            'fee' => 'required|numeric|min:0',

            // Payment Fields
            'paid_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ];
    }
}

