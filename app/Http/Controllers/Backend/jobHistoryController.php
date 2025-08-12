<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\JobsModel;
use App\Models\JobHistoryModel;

class jobHistoryController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = JobHistoryModel::getRecord($request);
        return view('backend.job_history.list', $data);
    }

    public function add()
    {
        $data['getEmployees'] = User::where('is_role', '=', 0)->get();
        $data['getJobs'] = JobsModel::get();
        return view('backend.job_history.add', $data);
    }

    public function add_post(Request $request)
    {
        $jobhistory = request()->validate([
            'employee_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'job_id' => 'required',
            'department_id' => 'required',
        ]);

        $jobhistory = new JobHistoryModel;
        $jobhistory->employee_id   = trim($request->employee_id);
        $jobhistory->start_date    = trim($request->start_date);
        $jobhistory->end_date      = trim($request->end_date);
        $jobhistory->job_id        = trim($request->job_id);
        $jobhistory->department_id = trim($request->department_id);
        $jobhistory->save();

        return redirect('admin/job_history')->with('success', 'Job History Successfully Added');
    }

    public function edit($id)
    {
        $data['getEmployees'] = User::where('is_role', '=', 0)->get();
        $data['getJobs'] = JobsModel::get();
        $data['getRecord'] = JobHistoryModel::find($id);
        return view('backend.job_history.edit', $data);
    }

    public function update($id, Request $request)
    {
        $jobhistory = JobHistoryModel::find($id);
        $jobhistory->employee_id   = trim($request->employee_id);
        $jobhistory->start_date    = trim($request->start_date);
        $jobhistory->end_date      = trim($request->end_date);
        $jobhistory->job_id        = trim($request->job_id);
        $jobhistory->department_id = trim($request->department_id);
        $jobhistory->save();

        return redirect('admin/job_history')->with('success', 'Job History Successfully Updated');
    }

    public function delete($id)
    {
        $recordDelete = JobHistoryModel::find($id);
        $recordDelete->delete();
        return redirect()->back()->with('error', 'Jobhistory Successfully Deleted');
    }
}
