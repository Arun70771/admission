<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ApplicationFee;
use App\Models\File;

class ApplicationFeeController extends Controller
{
    public function index(Request $request)
    {
        // Get the 'program' and 'payment_status' query parameters with default values
        $program = $request->get('program', 'all'); // 'all' will show all records
        $payment_status = $request->get('payment_status', 'all'); // 'all' will show all records regardless of payment status

        // Build the query
        $query = ApplicationFee::orderBy('id', 'DESC');

        // Filter by program if not 'all'
        if ($program !== 'all') {
            $query->where('programme', $program); // Assuming the field name is 'programme'
        }

        // Filter by payment status if not 'all'
        if ($payment_status !== 'all') {
            $query->where('payment', $payment_status); // Assuming the field name is 'payment_status'
        }

        // Execute the query with pagination
        $data = $query->simplePaginate(100);

        // Pass the data to the view
        return view('admin.admissions.application_fees_list', compact('data', 'program', 'payment_status'));
    }

    public function edit($id)
    {
        // Find the application fee record by ID
        $applicationFee = ApplicationFee::findOrFail($id);

        // Pass the record to the edit view
        return view('admin.admissions.application_edit', compact('applicationFee'));
    }

    public function update(Request $request, $id)
    {

        // dd($request);
        // Validate the incoming request data
        $validatedData = $request->validate([
            'payment' => 'required|string|max:255',
            'amount' => 'required|string|max:255',
        ]);

        // Find the application fee record by ID
        $applicationFee = ApplicationFee::findOrFail($id);

        // Update the record with the new data
        $applicationFee->update($validatedData);

        // Redirect back with a success message
        return redirect()->route('application_fees')->with('success', 'Application fee updated successfully.');
    }

    

    public function destroy($id)
    {
        // Find the application fee record by ID and delete it
        $applicationFee = ApplicationFee::findOrFail($id);
        $applicationFee->delete();

        // Redirect back with a success message
        return redirect()->route('application_fees')->with('success', 'Application fee deleted successfully.');
    }
}