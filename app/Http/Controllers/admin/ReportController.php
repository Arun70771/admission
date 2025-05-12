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
use App\Models\RegistrationForm;
use App\Models\PaymentResponse;
use PDF;

class ReportController extends Controller
{
    
    public function programmes()
    {
        $programmeNames = ['PhD', 'Master', 'Bachelor', 'Virtual Campus', 'Executive PhD'];
        $programmeData = [];
        $grandTotalCourseCount = 0;
        $grandTotalPaid = 0;
    
        foreach ($programmeNames as $programme) {
            $coursePayments = CoursePayment::where('programme_name', $programme)->get();
    
            $transformedLists = $coursePayments->map(function ($item) {
                $courseCount = DB::table('courses')
                    ->where('course_name', $item->slug)
                    ->count();
                $item->course_count = $courseCount;
    
                $stepStatusCount = DB::table('step_status')
                    ->leftJoin('courses', 'courses.application_id', '=', 'step_status.application_id')
                    ->where('step_status.pay_fee', 1)
                    ->where('courses.course_name', $item->slug)
                    ->count();
                $item->paid = (float) $stepStatusCount;
    
                return $item;
            });
    
            $totalCourseCount = $transformedLists->sum('course_count');
            $totalPaid = $transformedLists->sum('paid');
    
            $programmeData[$programme] = [
                'transformed_lists' => $transformedLists,
                'total_course_count' => $totalCourseCount,
                'total_paid' => $totalPaid,
            ];
    
            // Add to grand totals
            $grandTotalCourseCount += $totalCourseCount;
            $grandTotalPaid += $totalPaid;
        }
    
        return view('admin.reports.programmes', compact('programmeData', 'grandTotalCourseCount', 'grandTotalPaid'));
    }
    


    
    public function country(){
        $programmeNames = ['PhD', 'Master', 'Bachelor', 'Virtual Campus', 'Executive PhD'];
        $programmeData = [];
        $grandTotalCourseCount = 0;
        $grandTotalPaid = 0;

        foreach ($programmeNames as $programme) {
            $coursePayments = CoursePayment::where('programme_name', $programme)->get();

            $transformedLists = $coursePayments->map(function ($item) {
                // Count total courses
                $courseCount = DB::table('courses')
                    ->where('course_name', $item->slug)
                    ->count();
                $item->course_count = $courseCount;

                // Count paid applications
                $stepStatusCount = DB::table('step_status')
                    ->leftJoin('courses', 'courses.application_id', '=', 'step_status.application_id')
                    ->where('step_status.pay_fee', 1)
                    ->where('courses.course_name', $item->slug)
                    ->count();
                $item->paid = (float) $stepStatusCount;

                // Fetch country-wise student data
                $countryWiseData = DB::table('application_forms')
                    ->select('nationality', DB::raw('COUNT(*) as total_students'))
                    ->whereIn('application_id', function ($query) use ($item) {
                        $query->select('application_id')
                            ->from('courses')
                            ->where('course_name', $item->slug);
                    })
                    ->groupBy('nationality')
                    ->get()
                    ->keyBy('nationality'); // Key by country for easy access

                $item->country_wise = $countryWiseData;

                return $item;
            });

            // Summarize totals
            $totalCourseCount = $transformedLists->sum('course_count');
            $totalPaid = $transformedLists->sum('paid');

            $programmeData[$programme] = [
                'transformed_lists' => $transformedLists,
                'total_course_count' => $totalCourseCount,
                'total_paid' => $totalPaid,
            ];

            // Add to grand totals
            $grandTotalCourseCount += $totalCourseCount;
            $grandTotalPaid += $totalPaid;
        }

        return view('admin.reports.country', compact('programmeData', 'grandTotalCourseCount', 'grandTotalPaid'));
    }

    public function day(){
        return view('admin.reports.day', compact('programmeData', 'grandTotalCourseCount', 'grandTotalPaid'));
    }

    public function ResultsCampusCourses(){
        
    }

    public function virtualCampusCourses(Request $request)
    {
        $programme = 'Virtual Campus';

        // Fetch all courses for Virtual Campus
        $courses = CoursePayment::where('programme_name', $programme)->get();

        // Get filter values from request
        $paymentStatus = $request->input('payment_status'); // '1' for paid, '0' for unpaid
        $searchQuery = $request->input('search'); // Search input

        // Attach students data to each course
        foreach ($courses as $course) {
            $query = DB::table('courses')
                ->leftJoin('application_forms', 'application_forms.application_id', '=', 'courses.application_id')
                ->leftJoin('step_status', 'step_status.application_id', '=', 'courses.application_id')
                ->leftJoin('registration_forms', 'registration_forms.id', '=', 'application_forms.application_id') // Use the correct key
                ->where('courses.course_name', $course->slug)
                ->select(
                    'application_forms.application_id',
                    'application_forms.candidate_name',
                    'registration_forms.email',
                    'registration_forms.mobile',
                    'registration_forms.nationality',
                    'step_status.pay_fee'
                );

            // Apply search filter
            if ($searchQuery) {
                $query->where(function ($q) use ($searchQuery) {
                    $q->where('application_forms.candidate_name', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('registration_forms.email', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('registration_forms.mobile', 'LIKE', "%{$searchQuery}%");
                });
            }

            // Apply payment status filter
            if ($paymentStatus !== null) {
                $query->where('step_status.pay_fee', $paymentStatus);
            }

            $course->students = $query->distinct()->get();
        }

        return view('admin.reports.virtual_campus', compact('courses', 'paymentStatus', 'searchQuery'));
    }




    public function courseReport(Request $request, $course)
    {
        $course_details = CoursePayment::where('slug', $course)->first();

        // Get filter value from request
        $paymentStatus = $request->input('payment_status'); // '1' for paid, '0' for unpaid
        $searchQuery = $request->input('search'); // Get search input

        // Query to fetch application forms and join with registration_forms
        $applicationForms = DB::table('courses')
            ->leftJoin('application_forms', 'application_forms.application_id', '=', 'courses.application_id')
            ->leftJoin('step_status', 'step_status.application_id', '=', 'courses.application_id')
            ->leftJoin('registration_forms', 'registration_forms.id', '=', 'application_forms.application_id') // Join with registration_forms
            ->where('courses.course_name', $course)
            ->select(
                'application_forms.application_id',
                'application_forms.candidate_name',
                'registration_forms.email', // Fetch email from registration_forms
                'registration_forms.mobile', // Fetch mobile from registration_forms
                'registration_forms.nationality',
                'step_status.pay_fee' // Fetch payment status
            )
            ->distinct();

        // Apply filter for payment status if selected
        if ($paymentStatus !== null && $paymentStatus !== '') {
            $applicationForms->where('step_status.pay_fee', $paymentStatus);
        }

        // Apply search filter (if searchQuery is provided)
        if (!empty($searchQuery)) {
            $applicationForms->where(function ($query) use ($searchQuery) {
                $query->where('application_forms.candidate_name', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('registration_forms.email', 'LIKE', "%{$searchQuery}%")
                    ->orWhere('application_forms.application_id', 'LIKE', "%{$searchQuery}%");
            });
        }

        $applicationForms = $applicationForms->get();

        return view('admin.reports.course_report', compact('course_details', 'applicationForms', 'paymentStatus', 'searchQuery'));
    }

    // public function applicationDetails($application_id){
    //     $application_form = ApplicationForm::where('application_id',$application_id)->first();
    //     $passport_photograph = DocumentUpload::where('application_id',$application_id)->where('document_type', 'passport_photograph')->value('document_path');
    //     $document_upload = DocumentUpload::where('application_id',$application_id)->get();
    //     $educational_detail = EducationalDetail::where('application_id',$application_id)->first();
    //     $programme = Programme::where('application_id',$application_id)->first();

    //     $course = Course::where('application_id', $application_id)->get();
    //     $course->transform(function ($item) {
    //         $coursePayment = CoursePayment::where('slug', $item->course_name)->first();
    //         if ($coursePayment) {
    //             $item->course_name = $coursePayment->course_name;
    //         } else {
    //             $item->course_name = null;
    //         }

    //         return $item;
    //     });

    //     $mode_admission = ModeOfAdmission::where('application_id',$application_id)->first();

    //     return view('admin.reports.applicant_details',compact('mode_admission','course','programme','application_form','passport_photograph','document_upload','educational_detail'));
    // }

    public function applicationDetails($application_id)
    {
        // Fetch applicant details from both application_forms and registration_forms
        $application_form = DB::table('application_forms')
            ->leftJoin('registration_forms', 'registration_forms.id', '=', 'application_forms.application_id') // Corrected Join
            ->where('application_forms.application_id', $application_id)
            ->select(
                'application_forms.*',
                'registration_forms.email',  // Fetch email from registration_forms
                'registration_forms.mobile', // Fetch mobile from registration_forms
                'registration_forms.nationality' // Fetch nationality from registration_forms
            )
            ->first(); // Fetch only one record

        // Fetch passport photograph
        $passport_photograph = DocumentUpload::where('application_id', $application_id)
            ->where('document_type', 'passport_photograph')
            ->value('document_path');

        // Fetch all uploaded documents
        $document_upload = DocumentUpload::where('application_id', $application_id)->get();

        // Fetch educational details
        $educational_detail = EducationalDetail::where('application_id', $application_id)->first();

        // Fetch programme details
        $programme = Programme::where('application_id', $application_id)->first();

        // Fetch all courses related to the application
        $courses = Course::where('application_id', $application_id)->get();

        // Get all course names
        $courseNames = $courses->pluck('course_name')->toArray();

        // Fetch course payment details in a single query
        $coursePayments = CoursePayment::whereIn('slug', $courseNames)->pluck('course_name', 'slug');

        // Map course names to their full names
        $courses->transform(function ($course) use ($coursePayments) {
            $course->course_name = $coursePayments[$course->course_name] ?? null;
            return $course;
        });

        // Fetch mode of admission
        $mode_admission = ModeOfAdmission::where('application_id', $application_id)->first();

        return view('admin.reports.applicant_details', compact(
            'mode_admission',
            'courses',
            'programme',
            'application_form', // Now contains email, mobile, nationality
            'passport_photograph',
            'document_upload',
            'educational_detail'
        ));
    }

    public function application_pdf($userId)
    {
        $applications_form = ApplicationForm::where('application_id', $userId)->first();
        $programme = Programme::where('application_id', $userId)->first();
        
        
        $course = Course::where('application_id', $userId)->get();
        $course->transform(function ($item) {
            $coursePayment = CoursePayment::where('slug', $item->course_name)->first();
            if ($coursePayment) {
                $item->course_name = $coursePayment->course_name;
            } else {
                $item->course_name = null;
            }

            return $item;
        });


        $educational_detail = EducationalDetail::where('application_id', $userId)->first();
        $mode_admission = ModeOfAdmission::where('application_id', $userId)->first();
        $document_upload = DocumentUpload::where('application_id', $userId)->get();
        $registration_form = RegistrationForm::where('id', $userId)->first();
        $step_status = StepStatus::find($userId);
        $passport_photograph = 'storage/' . DocumentUpload::where('application_id', $userId)->where('document_type', 'passport_photograph')->value('document_path');
        // dd($passport_photograph);

        // $signatures = DocumentUpload::where('application_id', Auth::id())->where('document_type', 'signatures')->value('document_path');

        $signatures = 'storage/' . DocumentUpload::where('application_id', $userId)->where('document_type', 'signatures')->value('document_path');
        $payment_response = PaymentResponse::where('application_id', $userId)->latest()->first();
        $data = compact(
            'signatures',
            'passport_photograph',
            'applications_form',
            'programme',
            'course',
            'educational_detail',
            'mode_admission',
            'registration_form',
            'document_upload',
            'payment_response'
        );

        // Load the view and pass data
        $pdf = PDF::loadView('web.application-pdf', $data);

        return $pdf->stream('application.pdf');

        // Return the PDF as a download
        //return $pdf->download('application.pdf');
    }

}
