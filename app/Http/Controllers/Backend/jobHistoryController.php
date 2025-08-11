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
        return view('backend.job_history.list');
    }

    public function add()
    {
        $data['getEmployees'] = User::where('is_role', '=', 0)->get();
        $data['getJobs'] = JobsModel::get();
        return view('backend.job_history.add', $data);
    }
}
