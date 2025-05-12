<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Programme;
use App\Models\Course;
use App\Models\StepStatus;
use App\Models\CoursePayment;
use DB;
use App\Models\ApplicationForm;
use App\Models\EducationalDetail;
use App\Models\ModeOfAdmission;
use App\Models\DocumentUpload;


class OfferLetterController extends Controller
{
   
    public function documents(Request $request)
    {
        //$programme = 'VirtualCampus';
        $programmes = ['VirtualCampus','masters', 'bachelors', 'executivePhd', 'phd'];


       
        $paymentStatus = $request->input('payment_status');
        $searchQuery = $request->input('search');

    
        $query = DB::table('programmes')
            ->leftJoin('application_forms', 'application_forms.application_id', '=', 'programmes.application_id')
            ->leftJoin('step_status', 'step_status.application_id', '=', 'programmes.application_id')
            ->leftJoin('courses', 'courses.application_id', '=', 'programmes.application_id')
            ->whereIn('programmes.programme', $programmes)
            ->select(
                'application_forms.application_id',
                'application_forms.candidate_name',
                'application_forms.email',
                'application_forms.mobile',
                'application_forms.nationality',
                'courses.course_name',
                'step_status.pay_fee'
            );

        // Apply search filter
        if ($searchQuery) {
            $query->where(function ($q) use ($searchQuery) {
                $q->where('application_forms.candidate_name', 'LIKE', "%{$searchQuery}%")
                ->orWhere('application_forms.email', 'LIKE', "%{$searchQuery}%")
                ->orWhere('application_forms.mobile', 'LIKE', "%{$searchQuery}%");
            });
        }

        // Apply payment status filter
        if ($paymentStatus !== null) {
            $query->where('step_status.pay_fee', $paymentStatus);
        }

        // Get all filtered data
        $students = $query->distinct()->get();

        return view('admin.offer.documents', compact('students', 'paymentStatus', 'searchQuery','programmes'));
    }


    public function level1()
    {
        return view('admin.offer.level1');
    }

    public function level2()
    {
        return view('admin.offer.level2');
    }

    public function sendOfferLetter()
    {
        return view('admin.offer.send');
    }
   
    public function rejected()
    {
        return view('admin.offer.send');
    }
}
