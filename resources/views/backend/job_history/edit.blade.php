@extends('backend.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Job History</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Edit</a></li>
                <li class="breadcrumb-item active">Job History</li>
                </ol>
            </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Edit Job History</h3>
                            </div>
                            <form method="post" class="form-horizontal" action="{{ url('admin/job_history/edit/'.$getRecord->id) }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Employee Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                           <select name="employee_id" class="form-control">
                                            <option value="">Select Employee Name</option>
                                            @foreach ($getEmployees as $employee)
                                                <option {{ $employee->id == $getRecord->employee_id ? 'selected' : '' }} value="{{ $employee->id }}">{{ $employee->name }} {{ $employee->last_name }}</option>
                                            @endforeach
                                           </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Start Date <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="start_date" value="{{ $getRecord->start_date }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">End Date <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="end_date" value="{{ $getRecord->end_date }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Job Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                           <select name="job_id" class="form-control">
                                            <option value="">Select Job Name</option>
                                            @foreach ($getJobs as $job)
                                                <option {{ $job->id == $getRecord->job_id ? 'selected' : '' }} value="{{ $job->id }}">{{ $job->job_title }}</option>
                                            @endforeach
                                           </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Department Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                           <select name="department_id" class="form-control">
                                                <option value="">Select Department Name</option>
                                                <option {{ ($getRecord->department_id == 1) ? 'selected' : '' }} value="1">Development Department</option>
                                                <option {{ ($getRecord->department_id == 2) ? 'selected' : '' }} value="2">Designing Department</option>
                                           </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/job_history') }}" class="btn btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-primary float-right">Update</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- /.content-wrapper -->
  
@endsection