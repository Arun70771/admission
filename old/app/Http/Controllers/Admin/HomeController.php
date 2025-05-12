<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use App\Models\Admission;
use Illuminate\Support\Facades\Hash;
use Session;


class HomeController extends Controller
{    
    public function login()
    {
        return view('admin.login');
    }

    public function checkLogin(Request $request)
    {
        $request->validate([
            'email'   => 'required|email:rfc,dns',
            'password'   => 'required'
        ]);
        
        $username   =   $request->email;
        //    echo  $request->password;
        //   echo  $password   =   Hash::make($request->password);
        // $data_api = array( 
        //         "email"=> $username,
        //         "password"=> $request->password,
        //         );

        // $AdminLogin = AdminLogin($data_api);
        //dd('ok');
        //$response = json_encode($AdminLogin); 
        $data = Admin::where('email',$username)->where('is_active','1')->first();
                
        if($data)
        {   
            
                 if ( ! Hash::check($request->password,$data->password)) { 
                    Session::flash('message', 'You are not authorized to access !');
                    return redirect('admin/login-panel'); 
                }
                else
                {   



                   session(['adminuser'=> $data]);
                    
                        if ($data->role_id == 2){ 
                            return redirect('admin/pages');  
                        }else{ 
                            return redirect('admin/home');      
                        }

                }
        }
        else
        {
            Session::flash('message', 'You are not authorized to access the admin !');
            return redirect('admin/login-panel');
        }
   
    }

    public function logout()
    {
        session(['adminuser'=> '']);
        return redirect('admin/login-panel');
    }
    
    public function index()
    {   
        $is_not_complate   =  Admission::where('session','2024-02')->where('is_complate', 0)->count();
        $is_complate   =  Admission::where('session','2024-02')->where('is_complate', 1)->count();

        $m_sc_mathematics_complate       =  Admission::where('session','2024-02')->where('master_programmes','Applied Mathematics')->where('is_complate', 1)->count();
        $m_sc_mathematics_not_complate   =  Admission::where('session','2024-02')->where('master_programmes','Applied Mathematics')->where('is_complate', 0)->count();

        $m_sc_cs_complate       =  Admission::where('session','2024-02')->where('master_programmes','Computer Science')->where('is_complate', 1)->count();
        $m_sc_cs_not_complate   =  Admission::where('session','2024-02')->where('master_programmes','Computer Science')->where('is_complate', 0)->count();

        $m_sc_bio_complate       =  Admission::where('session','2024-02')->where('master_programmes','Computer Science')->where('is_complate', 1)->count();
        $m_sc_bio_not_complate   =  Admission::where('session','2024-02')->where('master_programmes','Computer Science')->where('is_complate', 0)->count();



        $info   =  compact(
            'm_sc_cs_complate',
            'm_sc_cs_not_complate',

            'm_sc_mathematics_not_complate','m_sc_mathematics_complate','is_not_complate','is_complate');
        return view('admin/'.'.dashboard')->with($info);
    }

    public function profile()
    {
        return view('admin.profileview');
    }

    public function thank_you_message()
    {
       
        $thanks_message = Session::get('thanks_message');
        if($thanks_message){
            return view('admin.thanks');
        } else {
            return redirect('/admin/home');
        }
    }
    
    public function changePassword(){
         return view('admin.change-password');
    }
    
    public function addChangePassword(Request $request)
    {
           $request->validate([
             'password' => 'required|confirmed|min:3|max:255',
          ],[
            'password.required' => 'password field is must be integer',            
        ]);

         $info                  =   Admin::find($request->id);
         $info->password       =    Hash::make($request->password);
         $info->save();

         if($info->id)
        {   
            
            return redirect('admin/logout')->with('message', 'Your Password has been changed.');
        }  
    }
    
    

}
