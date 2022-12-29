<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\CalenderImport;
use App\Models\Calender;
use Maatwebsite\Excel\Facades\Excel;

class SeasonFixtures extends Controller
{
    //
    public function index()
    {
        $Fixtures = Calender::paginate(4);

        return view('ferwafa.calender.index' ,['fixtures' =>$Fixtures]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx',
        ]);
 
        try {
            Excel::import(new CalenderImport, $request->file);
            return back()->with('message' , 'Calender Added Successfully');

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
             $failures = $e->failures();
             
            return back()->with('import_error' , $failures);
        }
    }
    

}
