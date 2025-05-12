<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\AdmissionOfferMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Admission;

class AdmissionOfficeMailController extends Controller
{
    public function sendAdmissionOffer(Request $request)
    {

    
        $validated = $request->validate([
            'from' => 'required|email',
            'selectedId' => 'required',
            'subject' => 'required|string|max:255',
            'mail_content' => 'required|string',
            'to_email' => 'required|email',
        ]);

        try {
            $data = [
                'name' => $request->name,
                'programme' => $request->programme,
                'mail_content' => $request->mail_content,
                'issued_on' => now()->format('Y-m-d'),
            ];


            Mail::to($request->to_email)
                ->cc('admission@sau.int')
                ->send(new AdmissionOfferMail($data, 'noreply-admission@sau.int'));

               // Admission::find($request->selectedId)->update(['offer_mail' => 1]);    
                Admission::where('id', $request->selectedId)->update(['offer_mail' => 1]);


            //   Mail::to($request->to_email)->send(new AdmissionOfferMail($data, $request->from));

            return response()->json([
                'success' => true,
                'id' => $request->selectedId,
                'message' => 'Admission offer email sent successfully!',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to send email. Please try again.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
