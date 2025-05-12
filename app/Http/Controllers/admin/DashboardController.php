<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


class DashboardController extends Controller
{
    public function index()
    {   
        $userId = Auth::id();
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

        return view('admin.dashboard', compact('programmeData', 'grandTotalCourseCount', 'grandTotalPaid'));
    }
}