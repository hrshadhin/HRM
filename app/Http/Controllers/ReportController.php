<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Project;
use App\Customer;

class ReportController extends Controller
{
    public function projects()
    {
        $projects = Project::orderBy('id','asc')->get();
        $pdf = PDF::loadView('report.projects',compact('projects'));
		$fileName='Projects.pdf';
		return $pdf->stream($fileName);
    }
    public function customers()
    {
        $customers = Customer::orderBy('id','asc')->get();
        $pdf = PDF::loadView('report.customers',compact('customers'));
		$fileName='customers.pdf';
		return $pdf->stream($fileName);
    }
}
