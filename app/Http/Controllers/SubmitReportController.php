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
        $submitreport = new SubmitReport();

        $submitreport->description = $request->get('description');
        $submitreport->topic_id = 1; // chưa lấy dc topic_id nên anh fixx cứng = 1 cho dễ làm
        $submitreport->file = $request->file('file')->getClientOriginalName();
        $request->file('file')->move(public_path('/upload'), $submitreport->file);
        // file nộp kia sẽ vào mục public/upload nhé

        $submitreport->save();
        return redirect()->route('submitreport');
    }
}
