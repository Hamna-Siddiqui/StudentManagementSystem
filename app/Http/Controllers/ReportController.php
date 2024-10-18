<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Payment;
use App;
use Auth;

class ReportController extends Controller
{
    public function report1($pid)
    {
        $payment = Payment::find($pid);
        if (!$payment) {
            return response()->json(['error' => 'Payment not found'], 404); // Handle case when payment is not found
        }

        $pdf = App::make('dompdf.wrapper');
        $print = "<div style='margin:20px; padding:20px;'>";
        $print.= "<h1 align='center'>Payment Receipt</h1>";
        $print.= "<hr/>";
        $print.= "<p> Receipt No : <b>" . $pid . " </b></p>";
        $print.= "<p> Date : <b>" . $payment->paid_date . "</b></p>";

        // Check if enrollment exists before trying to access it
        $enrollment = $payment->enrollment;
        $enrollmentNo = $enrollment->enroll_no ?? 'N/A';
        $studentName = $enrollment->student->name ?? 'N/A';
        $batchName = $enrollment->batch->name ?? 'N/A';
        
        $print.= "<p> Enrollment No : <b>" . $enrollmentNo . "</b></p>";
        $print.= "<p> Student Name : <b>" . $studentName . "</b></p>";
        
        $print.= "<hr/>";
        $print.= "<table style='width: 100%;'>";
        $print.= "<tr><td>Description</td><td>Amount</td></tr>";

        // Safely handle batch and amount values
        $print.= "<tr>";
        $print.= "<td> <h3>" . $batchName . "</h3> </td>";
        $print.= "<td> <h3>" . $payment->amount . "</h3> </td>";
        $print.= "</tr>";
        
        $print.= "</table>";
        $print.= "<hr/>";

        // Check if the user is authenticated before accessing their name
        $printedBy = Auth::check() ? Auth::user()->name : 'Unknown';
        $print.= "<span> Printed By: <b>" . $printedBy . "</b> </span>";
        $print.= "<span> Printed Date: <b>" . date('Y-m-d') . "</b> </span>";

        $print.= "</div>";

        $pdf->loadHTML($print);
        return $pdf->stream();
    }
}
