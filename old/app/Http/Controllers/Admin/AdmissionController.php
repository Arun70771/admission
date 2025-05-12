<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Admission;
use App\Models\File;
use App\Models\AdmissionOffice;
use App\Models\ApplicationFee;


class AdmissionController extends Controller
{
    protected $module = "admin/admissions";

    public function index()
    {
        $data   =  Admission::where('session', '2024-02')->orderBy('id', 'DESC')->paginate(100);
        $info   =  compact('data');
        return view($this->module . '.index')->with($info);
    }

    public function phd()
    {
        $data = [];

        // Fetching paid records
        $paids = Admission::where('session', '2024-02')
            ->where('programme', 'PhD')
            ->where('is_complate', '1')
            ->orderBy('id', 'DESC')
            ->paginate(1000);

        $paids->getCollection()->transform(function ($paid) {

            if ($paid->photo_identity_card) {
                $paid->photo_identity_card = '<a href="https://admissions.sau.ac.in/public/uploads/' . $paid->photo_identity_card . '">Click Here </a>';
            }
            if ($paid->passport) {
                $paid->passport = '<a href="https://admissions.sau.ac.in/public/uploads/' . $paid->passport . '">Click Here </a>';
            }
            if ($paid->candidate_signatures) {
                $paid->candidate_signatures = '<a href="https://admissions.sau.ac.in/public/uploads/' . $paid->candidate_signatures . '">Click Here </a>';
            }

            if ($paid->short_cv) {
                $paid->short_cv = '<a href="https://admissions.sau.ac.in/public/uploads/' . $paid->short_cv . '">Click Here </a>';
            }

            $admissionOffice = AdmissionOffice::find($paid->id);
            $applicationFee = ApplicationFee::where('application_id', $paid->id)
                ->latest()  // Assuming you want the latest fee record
                ->first();
            $paid->application_fee_status = $applicationFee ? $applicationFee->payment : 'Not Done';
            $paid->concession = $admissionOffice ? $admissionOffice->concession : null;
            $paid->criteria = $admissionOffice ? $admissionOffice->criteria : null;
            $paid->marks = $admissionOffice ? $admissionOffice->marks : null;
            $paid->check_level_1 = $admissionOffice ? $admissionOffice->check_level_1 : null;
            $paid->check_level_2 = $admissionOffice ? $admissionOffice->check_level_2 : null;
            $paid->final_payment = $admissionOffice ? $admissionOffice->final_payment : null;

            return $paid;
        });

        // Fetching unpaid records
        $unpaids = Admission::where('session', '2024-02')
            ->where('programme', 'PhD')
            ->where('is_complate', '0')
            ->orderBy('id', 'DESC')
            ->paginate(1000);

        $unpaids->getCollection()->transform(function ($unpaid) {
            if ($unpaid->photo_identity_card) {
                $unpaid->photo_identity_card = '<a href="https://admissions.sau.ac.in/public/uploads/' . $unpaid->photo_identity_card . '">Click Here </a>';
            }
            if ($unpaid->passport) {
                $unpaid->passport = '<a href="https://admissions.sau.ac.in/public/uploads/' . $unpaid->passport . '">Click Here </a>';
            }
            if ($unpaid->candidate_signatures) {
                $unpaid->candidate_signatures = '<a href="https://admissions.sau.ac.in/public/uploads/' . $unpaid->candidate_signatures . '">Click Here </a>';
            }
            if ($unpaid->short_cv) {
                $unpaid->short_cv = '<a href="https://admissions.sau.ac.in/public/uploads/' . $unpaid->short_cv . '">Click Here </a>';
            }

            $admissionOffice = AdmissionOffice::find($unpaid->id);
            $unpaid->concession = $admissionOffice ? $admissionOffice->concession : null;

            return $unpaid;
        });

        // Prepare data to pass to the view
        $info = compact('data', 'paids', 'unpaids');
        return view($this->module . '.phd')->with($info);
    }
    

    public function masters()
    {
        $data = [];
        $paids   =  Admission::where('session', '2024-02')
            ->where('programme', 'Masters')
            ->where('is_complate', '1')
            ->orderBy('id', 'DESC')
            ->paginate(1000);
        
        $total_final_payment = ApplicationFee::where('payment', 'Success')
            ->where('programme', 'MS (Data Science and Artificial Intelligence)')  // Assuming 'programme' is a column in the 'application_fees' table
            ->count();

        $paids->getCollection()->transform(function ($paid) {

            if ($paid->photo_identity_card) {
                $paid->photo_identity_card = '<a href="https://admissions.sau.ac.in/public/uploads/' . $paid->photo_identity_card . '">Click Here </a>';
            }
            if ($paid->passport) {
                $paid->passport = '<a href="https://admissions.sau.ac.in/public/uploads/' . $paid->passport . '">Click Here </a>';
            }
            if ($paid->candidate_signatures) {
                $paid->candidate_signatures = '<a href="https://admissions.sau.ac.in/public/uploads/' . $paid->candidate_signatures . '">Click Here </a>';
            }

            if ($paid->short_cv) {
                $paid->short_cv = '<a href="https://admissions.sau.ac.in/public/uploads/' . $paid->short_cv . '">Click Here </a>';
            }

            $admissionOffice = AdmissionOffice::find($paid->id);
            $applicationFee = ApplicationFee::where('application_id', $paid->id)
                ->latest()  // Assuming you want the latest fee record
                ->first();
            $paid->application_fee_status = $applicationFee ? $applicationFee->payment : 'Not Done';
            $paid->concession = $admissionOffice ? $admissionOffice->concession : null;
            $paid->criteria = $admissionOffice ? $admissionOffice->criteria : null;
            $paid->marks = $admissionOffice ? $admissionOffice->marks : null;
            $paid->check_level_1 = $admissionOffice ? $admissionOffice->check_level_1 : null;
            $paid->check_level_2 = $admissionOffice ? $admissionOffice->check_level_2 : null;
            $paid->final_payment = $admissionOffice ? $admissionOffice->final_payment : null;

            return $paid;
        });

        $unpaids = Admission::where('session', '2024-02')
            ->where('programme', 'Masters')
            ->where('is_complate', '0')
            ->orderBy('id', 'DESC')
            ->paginate(1000);

        $unpaids->getCollection()->transform(function ($unpaid) {
            if ($unpaid->photo_identity_card) {
                $unpaid->photo_identity_card = '<a href="https://admissions.sau.ac.in/public/uploads/' . $unpaid->photo_identity_card . '">Click Here </a>';
            }
            if ($unpaid->passport) {
                $unpaid->passport = '<a href="https://admissions.sau.ac.in/public/uploads/' . $unpaid->passport . '">Click Here </a>';
            }
            if ($unpaid->candidate_signatures) {
                $unpaid->candidate_signatures = '<a href="https://admissions.sau.ac.in/public/uploads/' . $unpaid->candidate_signatures . '">Click Here </a>';
            }
            if ($unpaid->short_cv) {
                $unpaid->short_cv = '<a href="https://admissions.sau.ac.in/public/uploads/' . $unpaid->short_cv . '">Click Here </a>';
            }


            return $unpaid;
        });

        $info   =  compact('data', 'paids', 'unpaids', 'total_final_payment');
        return view($this->module . '.phd')->with($info);
    }


    public function shortterm()
    {
        $data = [];
        $paids   =  Admission::where('session', '2024-02')
            ->where('programme', 'short_term')
            ->where('is_complate', '1')
            ->orderBy('id', 'DESC')
            ->paginate(1000);
        
        $total_final_payment = ApplicationFee::where('payment', 'Success')
            ->where('programme', 'Short-Term')  // Assuming 'programme' is a column in the 'application_fees' table
            ->count();


        $paids->getCollection()->transform(function ($paid) {


            if ($paid->photo_identity_card) {
                $paid->photo_identity_card = '<a href="https://admissions.sau.ac.in/public/uploads/' . $paid->photo_identity_card . '">Click Here </a>';
            }
            if ($paid->passport) {
                $paid->passport = '<a href="https://admissions.sau.ac.in/public/uploads/' . $paid->passport . '">Click Here </a>';
            }
            if ($paid->candidate_signatures) {
                $paid->candidate_signatures = '<a href="https://admissions.sau.ac.in/public/uploads/' . $paid->candidate_signatures . '">Click Here </a>';
            }

            if ($paid->short_cv) {
                $paid->short_cv = '<a href="https://admissions.sau.ac.in/public/uploads/' . $paid->short_cv . '">Click Here </a>';
            }


            $admissionOffice = AdmissionOffice::find($paid->id);
            $applicationFee = ApplicationFee::where('application_id', $paid->id)
                ->latest()  // Assuming you want the latest fee record
                ->first();
            $paid->application_fee_status = $applicationFee ? $applicationFee->payment : 'Note Done';
            $paid->concession = $admissionOffice ? $admissionOffice->concession : null;
            $paid->criteria = $admissionOffice ? $admissionOffice->criteria : null;
            $paid->marks = $admissionOffice ? $admissionOffice->marks : null;
            $paid->check_level_1 = $admissionOffice ? $admissionOffice->check_level_1 : null;
            $paid->check_level_2 = $admissionOffice ? $admissionOffice->check_level_2 : null;
            $paid->final_payment = $admissionOffice ? $admissionOffice->final_payment : null;
            $paid->check_level_2 = $admissionOffice ? $admissionOffice->check_level_2 : null;
            //dd($paid->concession);

            return $paid;
        });
        $unpaids = Admission::where('session', '2024-02')
            ->where('programme', 'short_term')
            ->where('is_complate', '0')
            ->orderBy('id', 'DESC')
            ->paginate(1000);


        $unpaids->getCollection()->transform(function ($unpaid) {
            if ($unpaid->photo_identity_card) {
                $unpaid->photo_identity_card = '<a href="https://admissions.sau.ac.in/public/uploads/' . $unpaid->photo_identity_card . '">Click Here </a>';
            }
            if ($unpaid->passport) {
                $unpaid->passport = '<a href="https://admissions.sau.ac.in/public/uploads/' . $unpaid->passport . '">Click Here </a>';
            }
            if ($unpaid->candidate_signatures) {
                $unpaid->candidate_signatures = '<a href="https://admissions.sau.ac.in/public/uploads/' . $unpaid->candidate_signatures . '">Click Here </a>';
            }
            if ($unpaid->short_cv) {
                $unpaid->short_cv = '<a href="https://admissions.sau.ac.in/public/uploads/' . $unpaid->short_cv . '">Click Here </a>';
            }


            return $unpaid;
        });

        $info   =  compact('data', 'paids', 'unpaids', 'total_final_payment');
        return view($this->module . '.phd')->with($info);
    }
    

    public function documents($id)
    {
        $data = Admission::where('id', $id)->first();
        #$data = Admission::where('id', $id)->first();
        $educational_docs = File::where('user_id', $id)->get();

        $office_data = AdmissionOffice::where('id', $id)->first();

        $info = compact('data', 'educational_docs', 'office_data');
        return view($this->module . '.documents')->with($info);
    }

    public function complate_list()
    {
        $data   =  Admission::where('is_complate', 1)->orderBy('updated_at', 'ASC')->paginate(1000);
        $info   =  compact('data');
        return view($this->module . '.complate_list')->with($info);
    }


    public function search(Request $request)
    {
        $search = $request->search;
        $data = Admission::where('email', 'LIKE', '%' . $search . '%')->orWhere('mobile', 'LIKE', '%' . $search . '%')->orWhere('name', 'LIKE', '%' . $search . '%')->paginate(30);
        $info   =  compact('data');
        return view($this->module . '.index')->with($info);
    }


    public function master_programmes($master_programmes)
    {
        //dd(1);
        if ($master_programmes == 'mathematics') {
            $master_programmes = 'Applied Mathematics';
        }

        $data = Admission::where('is_complate', 1)->where('master_programmes', $master_programmes)->paginate(1000);
        $info   =  compact('data');
        return view($this->module . '.index')->with($info);
    }

    public function Phd_programmes($Phd_programmes)
    {
        $data = Admission::where('is_complate', 1)->where('Phd_programmes', $Phd_programmes)->paginate(1000);
        $info   =  compact('data');
        return view($this->module . '.index')->with($info);
    }

    public function btech_reports()
    {

        $data = Admission::where('is_complate', 1)->where("programme", 'b-tech')->paginate(1000);
        $info   =  compact('data');
        return view($this->module . '.index')->with($info);
    }

    public function mtech_reports()
    {
        $data = Admission::where('is_complate', 1)->where("programme", 'm-tech')->paginate(1000);
        $info   =  compact('data');
        $info   =  compact('data');
        return view($this->module . '.index')->with($info);
    }


    public function in_complate_list()
    {
        $data   =  Admission::where('is_complate', 0)->paginate(30);
        $info   =  compact('data');
        return view($this->module . '.index')->with($info);
    }


    public function add()
    {
        return view($this->module . '.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_path'        => 'required',
            'heading' => 'required',
            'content'     => 'required',
            'is_active'          => 'required'
        ]);

        $info        =   new Admission;

        if ($request->image_path) {
            $image_path = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('uploads/Admission'), $image_path);
            $info->image_path        =   $image_path;
        }

        $info->heading                =   $request->heading;
        $info->content                =   $request->content;
        $info->link                   =   $request->link;
        $info->is_active              =   $request->is_active;
        $info->save();
        return redirect($this->module);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data     =   Admission::find($id);
        $info     =   compact('data');
        return view($this->module . '.edit')->with($info);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'heading' => 'required',
            'content'     => 'required',
            'is_active'          => 'required'
        ]);

        $info        =   Admission::find($id);

        if ($request->image_path) {
            $image_path = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('uploads/Admission'), $image_path);
            $info->image_path          =   $image_path;
        }

        $info->heading                =   $request->heading;
        $info->content                =   $request->content;
        $info->link                   =   $request->link;
        $info->is_active              =   $request->is_active;
        $info->save();

        return redirect($this->module);
    }

    public function destroy($id)
    {
        $info =   Admission::find($id);
        $info->delete();
        return redirect($this->module);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->Admission_id;
        $company = Admission::find($id);
        $company->is_active = $request->status;
        $company->save();
        return response()->json(['status' => 'success', 'success' => 'Status change successfully.']);
    }
}