@extends('backend.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">View Employee</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">View</a></li>
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
                                <h3 class="card-title">View Employee Details</h3>
                            </div>
                            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">ID <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->id }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">First Name</label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->name }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Last Name</label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->last_name }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Email ID</label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->email }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Phone Number</label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->phone_number }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Hire Date</label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y', strtotime($getRecord->hire_date)) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Job ID</label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->job_id }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Salary</label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->salary }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Commission PCT</label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->commission_pct }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Manager Name</label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->manager_id }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Department Name</label>
                                        <div class="col-sm-10">
                                            {{ $getRecord->department_id }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Role</label>
                                        <div class="col-sm-10">
                                            {{ !empty($getRecord->is_role) ? 'HR' : 'Employee' }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Created Date</label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y H:i:s A', strtotime($getRecord->created_at)) }}
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Updated Date</label>
                                        <div class="col-sm-10">
                                            {{ date('d-m-Y H:i:s A', strtotime($getRecord->updated_at)) }}
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/employees') }}" class="btn btn-secondary">Back</a>
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