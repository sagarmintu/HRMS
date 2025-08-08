<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;

class jobsController extends Controller
{
    public function index()
    {
        $data['getRecord'] = JobsModel::getRecord();
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
}
