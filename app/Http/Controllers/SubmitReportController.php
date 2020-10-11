<?php

namespace App\Http\Controllers;

use App\SubmitReport;
use Illuminate\Http\Request;

class SubmitReportController extends Controller
{
    //
    protected $submit;

    public function __construct(SubmitReport $submit)
    {
        $this->submit = $submit;
    }

    public function getFormSubmit()
    {
        return view('student.submitproject');
    }

    public function submitReport(Request $request)
    {
        print_r($request->allFiles());
        die;
//        $file = $request->filesTest;

    }
}
