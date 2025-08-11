@extends('backend.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Job History</h1>
                </div><!-- /.col -->
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/job_history/add') }}" class="btn btn-primary">Add Job History</a>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
            <div class="container-fliuid">
                <div class="row">
                    <div class="col-md-12">
                        @include('_message')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Job History Details</h3>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Employee Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Job Name</th>
                                            <th>Department Name</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($getRecord as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ !empty($data->get_user_name_single->name) ? $data->get_user_name_single->name : '' }} {{ !empty($data->get_user_name_single->last_name) ? $data->get_user_name_single->last_name : '' }}</td>
                                            <td>{{ date('d-m-Y', strtotime($data->start_date)) }} </td>
                                            <td>{{ date('d-m-Y', strtotime($data->end_date)) }}</td>
                                            <td>{{ !empty($data->get_job_single->job_title) ? $data->get_job_single->job_title : '' }}</td>
                                            <td>
                                                @if(!empty($data->department_id == 1))
                                                Development Department
                                                @else
                                                Designing Department
                                                @endif
                                            </td>
                                            <td>{{ date('d-m-Y H:i A', strtotime($data->created_at)) }}</td>
                                        </tr>
                                        @empty
                                        <tr colspan="100%">
                                            <td>No Record Found</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- /.content-wrapper -->
  
@endsection