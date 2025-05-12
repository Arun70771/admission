<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\StepStatus;
use App\Models\Programme;
use App\Models\CoursePayment;
use App\Models\Course;
use App\Models\DocumentUpload;
use App\Models\ModeOfAdmission;
use DB;

class UploadDocumentsControllerer extends Controller
{
    public function index(){

        $userId = Auth::id();
        $photo_identity = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'photo_identity')->value('document_path');
        $passport_photograph = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'passport_photograph')->value('document_path');
        $signatures = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'signatures')->value('document_path');
        $short_cv = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'short_cv')->value('document_path');
        $Proposed_research_plan_Area_of_interest = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'Proposed_research_plan_Area_of_interest')->value('document_path');
        $tenth_marksheet_certificate = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'tenth_marksheet_certificate')->value('document_path');
        $twelfth_marksheet_certificate = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'twelfth_marksheet_certificate')->value('document_path');
        $bachelors_marksheet_certificate = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'bachelors_marksheet_certificate')->value('document_path');      
        $master_marksheet_certificate = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'master_marksheet_certificate')->value('document_path');      
              
        $offer_letter_fellowship = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'offer_letter_fellowship')->value('document_path');
        $offer_letter_government = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'offer_letter_government')->value('document_path');
        $noc = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'noc')->value('document_path');
        $marks_of_qualifying_examination_image = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'marks_of_qualifying_examination')->value('document_path');
		$programme = Programme::where('application_id', Auth::id())->first(); 
        $salaried = ModeOfAdmission::where('application_id', Auth::id())->where('mode_of_admission', 'salaried')->first();
        $national_fellowship = ModeOfAdmission::where('application_id', Auth::id())->where('mode_of_admission', 'national_fellowship')->first();
        $marks_of_qualifying_examination = ModeOfAdmission::where('application_id', Auth::id())->where('mode_of_admission', 'Marks of Qualifying Examination')->first();
        
        

        $cuet_ug_img = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'score_card_of_cuet_ug')->value('document_path');
        $jee_mains_img = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'score_card_of_jee_mains')->value('document_path');
        $cuet_pg_img  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'score_card_of_cuet_pg')->value('document_path');
        $cat_img  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'score_card_of_cat')->value('document_path');
        $gate_img  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'score_card_of_gate')->value('document_path');
        $gmat_img  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'score_card_of_gmat')->value('document_path');
        $xat_img  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'score_card_of_xat')->value('document_path');
        $jrf_img  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'score_card_of_jrf')->value('document_path');
        $funded_government_img  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'score_card_of_funded_government')->value('document_path');
        $salaried_img  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'score_card_of_salaried')->value('document_path');
        $any_other_img  = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'score_card_of_any_other')->value('document_path');
      
        
        $CUET_UG = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CUET UG')->exists();
        $JEE_Mains = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'JEE Mains')->exists();
        $CUET_PG = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CUET PG')->exists();
        $CAT = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'CAT')->exists();
        $GATE = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'GATE')->exists();
        $GMAT = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'GMAT')->exists();
        $XAT = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'XAT')->exists();
        $JRF =  ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'JRF')->exists();        
        $funded_government =  ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'funded_government')->exists();


        $courses = Course::where('application_id', $userId)->get();
        $coursepayment = CoursePayment::get();
        
        $salaried = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'salaried')->exists();
        $any_other = ModeOfAdmission::where('application_id', $userId)->where('mode_of_admission', 'any-other')->exists();
              
        $documents = [
            'Score Card of CUET UG' => ['status' => $CUET_UG, 'image_path' => $cuet_ug_img],
            'Score Card of JEE Mains' => ['status' => $JEE_Mains, 'image_path' => $jee_mains_img],
            'Score Card of CUET PG' => ['status' => $CUET_PG, 'image_path' => $cuet_pg_img],
            'Score Card of CAT' => ['status' => $CAT, 'image_path' => $cat_img],
            'Score Card of GATE' => ['status' => $GATE, 'image_path' => $gate_img],
            'Score Card of GMAT' => ['status' => $GMAT, 'image_path' => $gmat_img],
            'Score Card of XAT' => ['status' => $XAT, 'image_path' => $xat_img],
            'Score Card of JRF' => ['status' => $JRF, 'image_path' => $jrf_img],
            'Score Card of funded_government' => ['status' => $funded_government, 'image_path' => $funded_government_img],
            'Score Card of salaried' => ['status' => $salaried, 'image_path' => $salaried_img],
            'Score Card of any-other' => ['status' => $any_other, 'image_path' => $any_other_img],
        ];

        //dump($documents);
        
        return view('web.file-upload',compact('courses','coursepayment','master_marksheet_certificate','documents', 'marks_of_qualifying_examination','marks_of_qualifying_examination_image','salaried','national_fellowship','bachelors_marksheet_certificate','twelfth_marksheet_certificate','tenth_marksheet_certificate','programme','photo_identity','passport_photograph','signatures','short_cv','offer_letter_fellowship','offer_letter_government','noc','Proposed_research_plan_Area_of_interest'));

    }

    
    public function next(Request $request)
    {
        $userId = Auth::id();
    
        $photo_identity = DocumentUpload::where('application_id', $userId)->where('document_type', 'photo_identity')->value('document_path');
        $passport_photograph = DocumentUpload::where('application_id', $userId)->where('document_type', 'passport_photograph')->value('document_path');
        $signatures = DocumentUpload::where('application_id', $userId)->where('document_type', 'signatures')->value('document_path');
        $tenth_marksheet_certificate = DocumentUpload::where('application_id', $userId)->where('document_type', 'tenth_marksheet_certificate')->value('document_path');
        $twelfth_marksheet_certificate = DocumentUpload::where('application_id', $userId)->where('document_type', 'twelfth_marksheet_certificate')->value('document_path');
    
       
        if (!$photo_identity) {
            return redirect()->back()->with('error', 'Photo identity document is required.');
        }
        
        if (!$passport_photograph) {
            return redirect()->back()->with('error', 'Passport Photograph document is required.');
        }
       
        if (!$signatures) {
            return redirect()->back()->with('error', 'Signatures document is required.');
        }
       
        if (!$tenth_marksheet_certificate) {
            return redirect()->back()->with('error', '10th Marksheet Certificate document is required.');
        }

        // if (!$twelfth_marksheet_certificate) {
        //     return redirect()->back()->with('error', '12th Marksheet Certificate document is required.');
        // }
    
       
        $stepStatus = StepStatus::where('application_id', $userId)->first();
    
        if ($stepStatus) {
            $stepStatus->update([
                'upload_documents' => true
            ]);
        } else {
            return redirect()->back()->with('error', 'Step status record not found. Please try again.');
        }
    
        return redirect()->route('index.preview')->with('success', 'All documents have been uploaded successfully!');
    }



public function upload(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'document' => 'nullable|file|max:512|mimes:jpeg,png,jpg',
        'document_type' => 'nullable|string',
    ], [
        'document.required' => 'Please upload a document.',
        'document.file' => 'The uploaded file must be a valid file.',
        'document.max' => 'The file size must not exceed 512 KB.',
        'document.mimes' => 'The file must be in JPEG, PNG, or JPG format.',
        'document_type.required' => 'Document type is required.',
        'document_type.string' => 'Document type must be a valid string.',
    ]);

    try {
        // Save the uploaded file
        $file = $request->file('document');
        $filePath = $file->store('uploads/documents', 'public');

        // Delete the old document if it exists
        DocumentUpload::where('document_type', $request->document_type)
            ->where('application_id', Auth::id())
            ->delete();

        // Save the new document
        DocumentUpload::create([
            'document_type' => $request->document_type,
            'document_path' => $filePath,
            'application_id' => Auth::id(),
        ]);

        return back()->with('success', 'The document has been uploaded successfully.');
    } catch (\Exception $e) {
        return back()->with('error', 'An error occurred: ' . $e->getMessage());
    }
}


    public function uploadPdf(Request $request)
    {
        $request->validate([
           'document' => 'nullable|file|max:512|mimes:pdf',
           'document_type' => 'required|string',
        ]);

        try {
            // Save the uploaded file
            $file = $request->file('document');
            $filePath = $file->store('uploads/documents', 'public');

            DocumentUpload::where('document_type', $request->document_type)->where('application_id', Auth::id())->delete();
            DocumentUpload::create([
                'document_type' => $request->document_type,
                'document_path' => $filePath,
                'application_id' => Auth::id(),
            ]);

            return back()->with('success', 'Your document has been uploaded successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }


    // Handle update
    public function update(Request $request, $id)
    {
        $request->validate([
            'document' => 'nullable|file|max:512|mimes:jpeg,png,jpg,pdf',
        ]);

        try {
            $document = DocumentUpload::findOrFail($id);

            // Delete old file
            if ($document->document_path && \Storage::disk('public')->exists($document->document_path)) {
                \Storage::disk('public')->delete($document->document_path);
            }

            // Save the new file
            $file = $request->file('document');
            $filePath = $file->store('uploads/documents', 'public');

            // Update the database record
            $document->update(['document_path' => $filePath]);

            return back()->with('success', 'Your document has been updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
