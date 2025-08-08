@extends('backend.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Employee</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Add</a></li>
                <li class="breadcrumb-item active">Employees</li>
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
                                <h3 class="card-title">Add Employee</h3>
                            </div>
                            <form method="post" class="form-horizontal" action="{{ url('admin/employees/add') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">First Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="name" placeholder="Enter First Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Last Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Email ID <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" name="email" placeholder="Enter Email ID" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Phone Number <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="phone_number" placeholder="Phone Number" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Hire Date <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="date" class="form-control" name="hire_date" placeholder="Hire Date" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Job Title <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="job_id" class="form-control" required>
                                                <option value="">Select Job Title</option>
                                                @foreach ($getJobs as $jobs)
                                                    <option value="{{ $jobs->id }}">{{ $jobs->job_title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Salary <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="salary" placeholder="Enter Salary" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Commission PCT <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="commission_pct" placeholder="Enter Commission PCT" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Manager Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="manager_id" class="form-control" required>
                                                <option value="">Select Manager Name</option>
                                                <option value="1">Sabari</option>
                                                <option value="2">Jayendra</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Department Name <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <select name="department_id" class="form-control" required>
                                                <option value="">Select Department Name</option>
                                                <option value="1">Development Department</option>
                                                <option value="2">Designing Department</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/employees') }}" class="btn btn-secondary">Back</a>
                                    <button type="submit" class="btn btn-primary float-right">Submit</button>
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