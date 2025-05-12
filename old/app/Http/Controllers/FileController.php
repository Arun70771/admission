<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\File;
  
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('fileUpload');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'files' => 'nullable', // Allow the files field to be empty
            'files.*' => [
                'nullable',             // Allow individual files to be null (empty)
                'file',                 // Ensure it's a file if it's not null
                'max:2048',             // Maximum file size (2 mb = 2048 kb)
                function ($attribute, $value, $fail) {  // Custom validation for file types
                    if ($value) {  // Only perform the validation if a file is uploaded
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
                }
            ],
        ], [
            'files.required' => 'Please upload at least one file.',
            'files.*.max' => 'Each file must not exceed 2 mb.',
            'files.*.file' => 'Each document must be a valid file.',
        ]);
        
      
        $files = [];
        if ($request->file('files')){
            foreach($request->file('files') as $key => $file)
            {
                $fileName = 'degrees_'.time().rand(1,99).'.'.$file->extension();  
                $file->move(public_path('uploads'), $fileName);
                $files[]['name'] = $fileName;
            }
        }
  
        foreach ($files as $key => $file) {
           // $file['name']=$file;
             $file['user_id']=$request->user_id;
           // print_r($file);
            File::create($file);  
        }
        return redirect('step6')->with('success', 'Uploaded document details saved successfully.');
    }
}