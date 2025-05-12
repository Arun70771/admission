<?php 
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
//use App\Models\User;
use App\Models\Admission;
use PDF;
use Session;
  

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        $id=Session::get('user')->id;
        $users     =   Admission::find($id);
        $data = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y'),
            'name' => 'kaushlendra',
            'info' => $users
        ]; 
            
        // $pdf = PDF::loadView('pdf.myPDF', $data);
      
        $pdf = PDF::loadView('pdf.myPDF', $data);
        return $pdf->stream('sau-admission-form-'. $users->name.'.pdf', array("Attachment" => false));
       // return $pdf->download('sau-admission-form-'. $users->name.'.pdf');


    }

    public function adminGeneratePDF($id)
    {
       // $id=Session::get('user')->id;
        $users     =   Admission::find($id);
        $data = [
            'title' => 'Welcome to SAU',
            'date' => date('m/d/Y'),
            'name' => 'kaushlendra',
            'info' => $users
        ]; 
            
        // $pdf = PDF::loadView('pdf.myPDF', $data);
      
        $pdf = PDF::loadView('pdf.myPDF', $data);
        return $pdf->stream('sau-admission-form-'. $users->name.'.pdf', array("Attachment" => false));
       // return $pdf->download('sau-admission-form-'. $users->name.'.pdf');


    }

}