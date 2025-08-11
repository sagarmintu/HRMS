<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\JobsExport;

class jobsController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = JobsModel::getRecord($request);
        return view('backend.jobs.list', $data);
    }

    public function add()
    {
        return view('backend.jobs.add');
    }

    public function add_post(Request $request)
    {
        $job = request()->validate([
            'job_title'   => 'required',
            'min_salary'  => 'required',
            'max_salary'  => 'required',
        ]);

        $job             = new JobsModel;
        $job->job_title  = trim($request->job_title);
        $job->min_salary = trim($request->min_salary);
        $job->max_salary = trim($request->max_salary);
        $job->save();
        return redirect('admin/jobs')->with('success', 'Jobs Successfully Registered');
    }

    public function view($id)
    {
        $data['getRecord'] = JobsModel::find($id);
        return view('backend.jobs.view',$data);
    }

    public function edit($id)
    {
        $data['getRecord'] = JobsModel::find($id);
        return view('backend.jobs.edit',$data);
    }

    public function update($id, Request $request)
    {
        $job = request()->validate([
            'job_title'   => 'required',
            'min_salary'  => 'required',
            'max_salary'  => 'required',
        ]);

        $job              = JobsModel::find($id);
        $job->job_title   = trim($request->job_title);
        $job->min_salary  = trim($request->min_salary);
        $job->max_salary  = trim($request->max_salary);
        $job->save();
        return redirect('admin/jobs')->with('success', 'Jobs Successfully Updated');
    }

    public function delete($id)
    {
        $recordDelete = JobsModel::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Jobs Successfully Deleted');
    }

    public function jobs_export(Request $request)
    {
        return Excel::download(new JobsExport, 'jobs.xlsx');
    }
}
