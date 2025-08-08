@extends('backend.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Jobs</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Add</a></li>
                <li class="breadcrumb-item active">Jobs</li>
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
                                <h3 class="card-title">Add Jobs</h3>
                            </div>
                            <form method="post" class="form-horizontal" action="{{ url('admin/jobs/add') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Job Title <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="job_title" placeholder="Enter Job Title" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Min Salary <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="min_salary" placeholder="Enter Min Salary" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-lable">Max Salary <span style="color: red;">*</span></label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" name="max_salary" placeholder="Enter Max Salary" required>
                                        </div>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <a href="{{ url('admin/jobs') }}" class="btn btn-secondary">Back</a>
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