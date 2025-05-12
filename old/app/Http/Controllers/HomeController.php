<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectRespons;
use Illuminate\Support\Facades\DB;
use App\Models\Admission;
use App\Models\File;
use Session;

class HomeController extends Controller
{
    //

    public function __construct()
    {
        //dd(Session::all()); //this is empty array

        // $id=Session::get('user')->id;
        // $this->isSession();

    }


    function step1()
    {
        $this->isComplated();
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $info   =  compact('data');
        return view('step1')->with($info);
    }

    function insert1(Request $request)
    {

      //  dd($request->all() );

        $id = Session::get('user')->id;
        // dd($request->programme);

        if ($request->programme == 'b-tech') {
            $request->validate([
                'programme' => 'required',
                'btech_programmes' => 'required',
                'btech_programmes2' => 'required',
            ], [
                'programme.required' => 'Please Enter the Programme',
                'btech_programmes.required' => 'Please Select B.Tech. Preference 1',
                'btech_programmes2.required' => 'Please Select B.Tech. Preference 2',
            ]);
        } elseif ($request->programme == 'm-tech') {
            $request->validate([
                'programme' => 'required',
                //  'mtech_programmes' => 'required',
                //  'mtech_programmes2' => 'required',
            ], [
                'programme.required' => 'Please Enter the Programme',
                //   'mtech_programmes.required' => 'Please Select M.Tech. Preference 1',
                //   'mtech_programmes2.required' => 'Please Select M.Tech. Preference 2',
            ]);
        } elseif ($request->programme == 'Masters') {
            $request->validate([
                'programme' => 'required',
                'master_programmes' => 'nullable',
            ], [
                'programme.required' => 'Please Enter the Programme',
                'master_programmes.required' => 'Please Select Master’s  Programmes',
            ]);
            return redirect()->route('submission-close');
        } elseif ($request->programme == 'PhD') {
            $request->validate([
                'programme' => 'required',
                'Phd_programmes' => 'required',
            ], [
                'programme.required' => 'Please Enter the Programme',
                'Phd_programmes.required' => 'Please Select PhD Programmes',
            ]);
        }


        $info        =   Admission::find($id);
        $info->programme            =   $request->programme;
        $info->short_term_programmes =   $request->short_term_programmes;
        $info->btech_programmes     =   $request->btech_programmes;
        $info->btech_programmes2    =   $request->btech_programmes2;
        $info->mtech_programmes     =   $request->mtech_programmes;
        $info->master_programmes    =   $request->master_programmes;
        $info->mtech_programmes2    =   $request->mtech_programmes2;
        $info->Phd_programmes       =   $request->Phd_programmes;
        $info->session              =   '2024-02';

        if ($request->programme == 'Masters') {
            $info->saarc                =  'non-saarc';
        } else {
            $info->saarc       =   $request->saarc;
        }


        if ($info->step < 1) {
            $info->step                   =  1;
        }
        $info->save();
        return redirect('step2')->with('success', 'Program/Campus Detail Saved');
    }

    function step2()
    {

        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $info   =  compact('data');
        return view('step2')->with($info);
    }


    function insert2(Request $request)
    {
        $id = Session::get('user')->id;

        //  dd($request->p_address);

        $request->validate([
            'nationality' => 'required',
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'dob' => 'required',
            'father_name' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'city' => 'required',
            'pin_code' => 'required',
            'state' => 'required',
            'country' => 'required',
            // 'p_address' => 'required',
            // 'p_city' => 'required',
            // 'p_pin_code' => 'required',
            // 'p_state' => 'required',
            // 'p_country' => 'required'
        ], [
            'nationality.required' => 'Please Enter Your Nationality',
            'name.required' => 'Please Enter Your Name',
            'email.required' => 'Please Enter Your Email Address',
            'mobile.required' => 'Please Enter Your Mobile Number',
            'dob.required' => 'Please Enter Your Date of Birth',
            'father_name.required' => 'Please Enter the Father /Mother/Guardian /Spouse Name',
            'gender.required' => 'Please Enter Your Gender',
            'address.required' => 'Please Enter Your Address',
            'city.required' => 'Please Enter Your City',
            'pin_code.required' => 'Please Enter the Pin Code',
            'state.required' => 'Please Enter the Name of State',
            'country.required' => 'Please Enter the Name of Country',
            // 'p_address.required' => 'Please Enter Your Address',
            // 'p_city.required' => 'Please Enter The City Name',
            // 'p_pin_code.required' => 'Please Enter The Pin Code',
            // 'p_state.required' => 'Please Enter The State Name',
            // 'p_country.required' => 'Please Enter The Country Name',            
        ]);


        $info        =   Admission::find($id);
        $info->nationality       =   $request->nationality;
        $info->name              =   $request->name;
        $info->email             =   $request->email;
        $info->mobile            =   $request->mobile;
        $info->dob               =   $request->dob;
        $info->father_name       =   $request->father_name;
        $info->gender            =   $request->gender;
        $info->address           =   $request->address;
        $info->city              =   $request->city;
        $info->pin_code          =   $request->pin_code;
        $info->state             =   $request->state;
        $info->country           =   $request->country;

        $info->p_address                   =   $request->p_address;
        $info->p_city                   =   $request->p_city;
        $info->p_pin_code                   =   $request->p_pin_code;
        $info->p_state                   =   $request->p_state;
        $info->p_country                   =   $request->p_country;

        $info->passport_no                   =   $request->passport_no;
        $info->doi                   =   $request->doi;
        $info->doe                   =   $request->doe;
        $info->poi                   =   $request->poi;
        $info->issuing_authority                   =   $request->issuing_authority;

        if ($info->step < 2) {
            $info->step                   =  2;
        }

        $info->save();
        return redirect('step3')->with('success', 'Personal Detail Saved');
    }


    function step3()
    {
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $info   =  compact('data');
        return view('step3')->with($info);
    }

    function insert3(Request $request)
    {
        $id = Session::get('user')->id;
        $info        =   Admission::find($id);

        if ($request->programme == 'b-tech') {
            $request->validate([
                's_passing' => 'required',
                // 's_cgpa' => 'required',
                's_college_name' => 'required',
                's_country' => 'required',
                //   'jee_score' => 'required',
                's_board_name' => 'required',
                's_subject' => 'required'
            ], [
                's_passing.required' => 'Please Enter Year of Passing',
                //  's_cgpa.required' => 'Please Enter Marks %age / CGPA *',
                's_college_name.required' => 'Please Enter Name of School/College *',
                's_country.required' => 'Please Enter City/Region & Country *',
                //   'jee_score.required' => 'Please Enter JEE Score *',
                's_board_name.required' => 'Please Enter Name of Board *',
                's_subject.required' => 'Please Enter Main Subject Studied *'
            ]);
        } elseif ($request->programme == 'm-tech') {
            $request->validate([
                's_passing' => 'required',
                's_cgpa' => 'required',
                's_college_name' => 'required',
                's_country' => 'required',
                's_board_name' => 'required',
                's_subject' => 'required',
                'b_country' => 'required',
                'b_title' => 'required',
                'b_passing' => 'required',
                'b_degree_duration' => 'required',
                'b_examination' => 'required',
                'b_evaluation' => 'required',
                'b_studied' => 'required',
                'b_cgpa' => 'required',
                'poi' => 'required',
                //  'gate_score' => 'required'
            ], [
                's_passing.required' => 'Please Enter Year of Passing',
                's_cgpa.required' => 'Please Enter Marks %age / CGPA *',
                's_college_name.required' => 'Please Enter Name of School/College *',
                's_country.required' => 'Please Enter City/Region & Country *',
                // 'gate_score.required' => 'Please Enter GATE Score *',
                's_board_name.required' => 'Please Enter Name of Board *',
                's_subject.required' => 'Please Enter Main Subject Studied *',
                'b_country.required' => 'Please Enter City/Region & Country *',
                'b_title.required' => 'Please Enter Title of the Bachelor’s Degree *',
                'b_passing.required' => 'Please Enter Year / Expected Year of Passing *',
                'b_degree_duration.required' => 'Please Enter Duration of your Bachelor’s degree? *',
                'b_examination.required' => 'Please Enter the Examination System *',
                'b_evaluation.required' => 'Please Enter the Evaluation System *',
                'b_studied.required' => 'Please Enter the Main Subject Studied in Bachelor’s Programme *',
                'b_cgpa.required' => 'Please Enter the Marks %age / CGPA *',
                'poi.required' => 'Please Enter the Place of Issue *'
            ]);
        } elseif ($request->programme == 'Masters') {
            $request->validate([
                's_passing' => 'required',
                's_cgpa' => 'required',
                's_college_name' => 'required',
                's_country' => 'required',
                's_board_name' => 'required',
                's_subject' => 'required',
                'b_country' => 'required',
                'b_title' => 'required',
                'b_passing' => 'required',
                'b_degree_duration' => 'required',
                'b_examination' => 'required',
                'b_evaluation' => 'required',
                'b_studied' => 'required',
                'b_cgpa' => 'required',
                'poi' => 'required'
            ], [
                's_passing.required' => 'Please Enter Year of Passing',
                's_cgpa.required' => 'Please Enter Marks %age / CGPA *',
                's_college_name.required' => 'Please Enter Name of School/College *',
                's_country.required' => 'Please Enter City/Region & Country *',
                's_board_name.required' => 'Please Enter Name of Board *',
                's_subject.required' => 'Please Enter Main Subject Studied *',
                'b_country.required' => 'Please Enter City/Region & Country *',
                'b_title.required' => 'Please Enter Title of the Bachelor’s Degree *',
                'b_passing.required' => 'Please Enter Year / Expected Year of Passing *',
                'b_degree_duration.required' => 'Please Enter Duration of your Bachelor’s degree? *',
                'b_examination.required' => 'Please Enter the Examination System *',
                'b_evaluation.required' => 'Please Enter the Evaluation System *',
                'b_studied.required' => 'Please Enter the Main Subject Studied in Bachelor’s Programme *',
                'b_cgpa.required' => 'Please Enter the Marks %age / CGPA *',
                'poi.required' => 'Please Enter the Place of Issue *'
            ]);
        } elseif ($request->programme == 'PhD') {
            $request->validate([
                's_passing' => 'required',
                's_cgpa' => 'required',
                's_college_name' => 'required',
                's_country' => 'required',
                's_board_name' => 'required',
                's_subject' => 'required',
                'b_country' => 'required',
                'b_title' => 'required',
                'b_passing' => 'required',
                'b_degree_duration' => 'required',
                'b_examination' => 'required',
                'b_evaluation' => 'required',
                'b_studied' => 'required',
                'b_cgpa' => 'required',
                'b_college' => 'required',
                'poi' => 'required',
                'm_title' => 'required',
                'm_passing' => 'required',
                'm_cgpa' => 'required',
            ], [
                's_passing.required' => 'Please Enter Year of Passing',
                's_cgpa.required' => 'Please Enter Marks %age / CGPA *',
                's_college_name.required' => 'Please Enter Name of School/College *',
                's_country.required' => 'Please Enter City/Region & Country *',
                's_board_name.required' => 'Please Enter Name of Board *',
                's_subject.required' => 'Please Enter Main Subject Studied *',
                'b_country.required' => 'Please Enter City/Region & Country *',
                'b_title.required' => 'Please Enter Title of the Bachelor’s Degree *',
                'b_passing.required' => 'Please Enter Year / Expected Year of Passing *',
                'b_degree_duration.required' => 'Please Enter Duration of your Bachelor’s degree? *',
                'b_examination.required' => 'Please Enter the Examination System *',
                'b_evaluation.required' => 'Please Enter the Evaluation System *',
                'b_studied.required' => 'Please Enter the Main Subject Studied in Bachelor’s Programme *',
                'b_cgpa.required' => 'Please Enter the Marks %age / CGPA *',
                'b_college.required' => 'Please Enter Name of School/College *',
                'poi.required' => 'Please Enter the Place of Issue *',
                'm_title.required' => 'Please Enter Title of the Master’s Degree *',
                'm_passing.required' => 'Please Select Year / Expected Year of Passing *',
                'm_cgpa.required' => 'Please Enter Marks %age / CGPA *',
            ]);
        } else {

            $request->validate([
                's_passing' => 'required',
                's_cgpa' => 'required',
                's_college_name' => 'required',
                's_country' => 'required'
            ], [
                's_college_name.required' => 'Please Enter 12TH Collage name',
                's_cgpa.required' => 'Please Enter Year of Passing *',
                's_country.required' => 'Please Enter City/Region & Country *',
            ]);
        }

        $info->jee_score               =   $request->jee_score;
        $info->gate_score              =   $request->gate_score;
        $info->s_passing               =   $request->s_passing;
        $info->b_cgpa                  =   $request->b_cgpa;
        $info->s_cgpa                  =   $request->s_cgpa;
        $info->s_college_name          =   $request->s_college_name;
        $info->s_board_name            =   $request->s_board_name;
        $info->s_subject               =   $request->s_subject;
        $info->b_country               =   $request->b_country;
        $info->s_country               =   $request->s_country;
        $info->b_title                 =   $request->b_title;
        $info->b_passing               =   $request->b_passing;
        $info->b_degree_duration       =   $request->b_degree_duration;
        $info->b_examination           =   $request->b_examination;
        $info->b_college               =   $request->b_college;
        $info->poi                     =   $request->poi;
        $info->b_evaluation            =   $request->b_evaluation;
        $info->b_gpa                   =   $request->b_gpa;
        $info->b_studied               =   $request->b_studied;
        $info->bachelor_degree         =   $request->bachelor_degree;
        $info->m_title                 =   $request->m_title;
        $info->m_passing               =   $request->m_passing;
        $info->m_cgpa                  =   $request->m_cgpa;
        $info->m_college               =   $request->m_college;
        $info->m_board                 =   $request->m_board;
        $info->m_studied               =   $request->m_studied;
        $info->m_degree_duration       =   $request->m_degree_duration;
        $info->master_degree           =   $request->master_degree;
        $info->m_examination           =   $request->m_examination;
        $info->m_evaluation            =   $request->m_evaluation;
        $info->m_gpa                   =   $request->m_gpa;
        $info->fellowship              =   $request->fellowship;
        $info->A_fellowship_name       =   $request->A_fellowship_name;
        $info->A_fellowship_country    =   $request->A_fellowship_country;
        $info->A_fellowship_entrance   =   $request->A_fellowship_entrance;
        $info->B_funding_agency        =   $request->B_funding_agency;
        $info->B_funding_agency_name   =   $request->B_funding_agency_name;
        $info->B_funding_years_duration =   $request->B_funding_years_duration;
        $info->C_employment_country     =   $request->C_employment_country;
        $info->C_organization_name      =   $request->C_organization_name;
        $info->C_organization_nature    =   $request->C_organization_nature;
        $info->C_current_organization_years =   $request->C_current_organization_years;
        $info->C_current_organization_month =   $request->C_current_organization_month;
        $info->organization_leave       =   $request->organization_leave;

        if ($info->step < 3) {
            $info->step                   =  3;
        }

        $info->save();
        return redirect('step4')->with('success', 'Education Detail Saved');
    }


    function step4()
    {
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $info   =  compact('data');
        return view('step4')->with($info);
    }


    function insert4(Request $request)
    {
        $id = Session::get('user')->id;
        $request->validate([
            'hostel_facility' => 'required',
            'know_about' => 'required',
        ]);

        $info        =   Admission::find($id);
        $info->hostel_facility      =   $request->hostel_facility;
        $info->know_about           =   implode(',', $request->know_about);

        if ($info->step < 4) {
            $info->step                   =  6;
        }

        $info->save();
        return redirect('step5')->with('success', 'Further Information has been saved successfully');
    }

    function step5()
    {
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $files     =   File::where('user_id', $id)->get();
        $info   =  compact('data', 'files');
        return view('step5')->with($info);
    }

    function insert5(Request $request)
    {
        $id = Session::get('user')->id;
        
        $request->validate([
            'files' => 'nullable',
            'files.*' => [
                'file',                               // Make sure it's a file
                'max:102400',                           // Maximum file size (500 KB = 512000 KB)
                function ($attribute, $value, $fail) {  // Custom validation for file types
                    // Get the file's extension
                    $extension = $value->getClientOriginalExtension();
                    
                    // Check if the file is a photo or signature (png/jpg)
                    if (in_array($extension, ['png', 'jpg', 'jpeg'])) {
                        return; // Valid for photos and signatures
                    }
                    
                    // Otherwise, check if it's a PDF
                    if ($extension !== 'pdf') {
                        return $fail("The file format must be PNG, JPG, JPEG, or PDF.");
                    }
                }
            ],
        ], [
            'files.required' => 'Please upload at least one file.',
            'files.*.max' => 'Each file must not exceed 100 KB.',
            'files.*.file' => 'Each document must be a valid file.',
        ]);


        $info        =   Admission::find($id);

        $images = array();
        if ($files = $request->file('files')) {
            foreach ($files as $file) {
                $name = 'edu_' . time() . '.' . $file->getClientOriginalName();
                $file->move(public_path('/uploads'), $name);
                $images[] = $name;
            }
        }

        $info->educational_degrees        =  implode("|", $images);

        if ($info->step < 5) {
            $info->step                   =  5;
        }

        $info->save();

        return redirect('step6')->with('success', 'Upload Documents  has been saved successfully');
    }

    function step6()
    {
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $info   =  compact('data');
        return view('step6')->with($info);
    }

    function insert6(Request $request)
    {
        $id = Session::get('user')->id;
        $data = Admission::find($id);

        $request->validate([
            'photo_identity_card' => $data->photo_identity_card ? 'nullable|mimes:jpg,jpeg,png|max:102400' : 'required|mimes:jpg,jpeg,png|max:102400', // Conditional rule for photo_identity_card
            'passport' => $data->passport ? 'nullable|mimes:jpg,jpeg,png|max:102400' : 'required|mimes:jpg,jpeg,png|max:102400', // Conditional rule for passport
            'candidate_signatures' => $data->candidate_signatures ? 'nullable|mimes:jpg,jpeg,png|max:102400' : 'required|mimes:jpg,jpeg,png|max:102400', // Conditional rule for candidate_signatures
        
            // Not required, but if uploaded, follow the same rules
            'short_cv' => 'nullable|mimes:pdf|max:102400', // Max 100 KB, PDF format
            'national_fellowship_offer_letter' => 'nullable|mimes:pdf|max:102400', // Max 100 KB, PDF format
            'government_funding_offer_letter' => 'nullable|mimes:pdf|max:102400', // Max 100 KB, PDF format
            'noc' => 'nullable|mimes:pdf|max:102400', // Max 100 KB, PDF format
        ], [
            'photo_identity_card.required' => 'Please Upload Photo Identity Card *',
            'photo_identity_card.mimes' => 'The Photo Identity Card must be a file of type: jpg, jpeg, png.',
            'photo_identity_card.max' => 'The Photo Identity Card must not be greater than 100 KB.',
        
            'passport.required' => 'Please Upload Passport size Photograph*',
            'passport.mimes' => 'The Passport size Photograph must be a file of type: jpg, jpeg, png.',
            'passport.max' => 'The Passport size Photograph must not be greater than 100 KB.',
        
            'candidate_signatures.required' => 'Please Upload Candidate signatures *',
            'candidate_signatures.mimes' => 'The Candidate Signature must be a file of type: jpg, jpeg, png.',
            'candidate_signatures.max' => 'The Candidate Signature must not be greater than 100 KB.',
        
            // Custom messages for the optional fields
            'short_cv.mimes' => 'The Short CV must be a PDF file.',
            'short_cv.max' => 'The Short CV must not be greater than 100 KB.',
        
            'national_fellowship_offer_letter.mimes' => 'The National Fellowship Offer Letter must be a PDF file.',
            'national_fellowship_offer_letter.max' => 'The National Fellowship Offer Letter must not be greater than 100 KB.',
        
            'government_funding_offer_letter.mimes' => 'The Government Funding Offer Letter must be a PDF file.',
            'government_funding_offer_letter.max' => 'The Government Funding Offer Letter must not be greater than 100 KB.',
        
            'noc.mimes' => 'The NOC must be a PDF file.',
            'noc.max' => 'The NOC must not be greater than 100 KB.',
        ]);

        // dd( $request);
        $info        =   Admission::find($id);
        if ($request->photo_identity_card) {
            $photo_identity_card = 'photo_' . time() . '.' . $request->photo_identity_card->extension();
            $request->photo_identity_card->move(public_path('/uploads'), $photo_identity_card);
            $info->photo_identity_card        =   $photo_identity_card;
        }

        if ($request->short_cv) {
            $short_cv = 'short_cv_' . time() . '.' . $request->short_cv->extension();
            $request->short_cv->move(public_path('/uploads'), $short_cv);
            $info->short_cv        =   $short_cv;
        }

        if ($request->candidate_signatures) {
            $candidate_signatures = 'candidate_signatures_' . time() . '.' . $request->candidate_signatures->extension();
            $request->candidate_signatures->move(public_path('/uploads'), $candidate_signatures);
            $info->candidate_signatures        =   $candidate_signatures;
        }

        if ($request->passport) {
            $passport = 'passport_' . time() . '.' . $request->passport->extension();
            $request->passport->move(public_path('/uploads'), $passport);
            $info->passport        =   $passport;
        }

        if ($request->national_fellowship_offer_letter) {
            $national_fellowship_offer_letter = 'national_fellowship_' . time() . '.' . $request->national_fellowship_offer_letter->extension();
            $request->national_fellowship_offer_letter->move(public_path('/uploads'), $national_fellowship_offer_letter);
            $info->national_fellowship_offer_letter        =   $national_fellowship_offer_letter;
        }

        if ($request->government_funding_offer_letter) {
            $government_funding_offer_letter = 'government_funding_' . time() . '.' . $request->government_funding_offer_letter->extension();
            $request->government_funding_offer_letter->move(public_path('/uploads'), $government_funding_offer_letter);
            $info->government_funding_offer_letter        =   $government_funding_offer_letter;
        }

        if ($request->noc) {
            $noc = 'noc_' . time() . '.' . $request->noc->extension();
            $request->noc->move(public_path('/uploads'), $noc);
            $info->noc        =   $noc;
        }

        if ($info->step < 6) {
            $info->step                   =  6;
        }
        $info->save();
        return redirect('step7')->with('success', 'Uploaded document has been saved successfully.');
    }

    function step7()
    {
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $info   =  compact('data');
        return view('step7')->with($info);
    }

    function insert7(Request $request)
    {

        $id = Session::get('user')->id;
        $request->validate([
            'chkConfirm' => 'required',
            //'tracking_id' => 'required',
        ]);
        $info        =   Admission::find($id);

        if ($info->step < 7) {
            $info->step                   =  7;
        }
        $info->is_complate                =  1;
        //  $info->tracking_id                =  $request->tracking_id;
        $info->save();

        return redirect('complated')->with('success', 'Your registration has been successfully completed');
    }

    function complated()
    {
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $info   =  compact('data');
        return view('complated')->with($info);
    }

    function preview()
    {
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        $info   =  compact('data');
        return view('preview')->with($info);
    }

    function isComplated()
    {
        $id = Session::get('user')->id;
        $data     =   Admission::find($id);
        if ($data->is_complate == 1) {
            //echo "asa";die;
            //return redirect()->route('complated');
            return redirect()->to('/login');
            //return redirect('complated');
        }
    }
}
