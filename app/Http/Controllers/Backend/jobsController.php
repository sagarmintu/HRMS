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
        return view('backend.jobs.list');
    }
}
