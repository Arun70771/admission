<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdmissionOffice;


class AdmissionOfficeController extends Controller
{
    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required',
            'concession' => 'nullable',
            'criteria' => 'nullable|string|max:255',
            'marks' => 'nullable|string|max:255',
            'check_level_1' => 'nullable|boolean',
            'check_level_2' => 'nullable|boolean',
            'final_payment' => 'nullable|boolean',
            'final_payment' => 'nullable|boolean',
        ]);

        $admission = AdmissionOffice::updateOrCreate(
            ['id' => $request->id], // Update if ID is provided, otherwise create
            $validated
        );

        return response()->json(['success' => true, 'data' => $admission]);
    }
}
