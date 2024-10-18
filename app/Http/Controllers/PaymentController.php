<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Enrollment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch payments with eager loading and pagination
        $payments = Payment::with('enrollment')->paginate(5); // Eager load the relationship

        // Return view with payments
        return view('Payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        return view('Payments.create', compact('enrollments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        Payment::create($validatedData);

        return redirect('/Payments')->with('flash_message', 'Payment added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $payment = Payment::with('enrollment')->findOrFail($id);

        if (!$payment->enrollment) {
            abort(404, 'Enrollment not found for this payment.');
        }

        return view('Payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $payment = Payment::with('enrollment')->findOrFail($id);
        $enrollments = Enrollment::pluck('enroll_no', 'id');
        return view('Payments.edit', compact('payment', 'enrollments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $validatedData = $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'paid_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        $payment->update($validatedData);

        return redirect('/Payments')->with('flash_message', 'Payment updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Payment::destroy($id);
        return redirect('/Payments')->with('flash_message', 'Payment deleted successfully!');
    }
}
