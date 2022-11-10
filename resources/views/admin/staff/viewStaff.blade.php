@extends('admin.layout.layout')
@section('title', 'Admin')
@section('content_admin')

    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Staff</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">View Staff</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="bootstrap-data-table-panel">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Avatar</th>
                                        <th>Tel</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff as $s)
                                        <tr>
                                            <td>{{ $s->fullname }}</td>
                                            <td><img style="border-radius:50%;-moz-border-radius:50%;-webkit-border-radius:50%;"
                                                    width="100px"
                                                    src="{{ url('asset/admin/images/avatar/' . $s->picture) }}" /></td>
                                            <td>{{ $s->tel }}</td>
                                            <td>{{ $s->address }}</td>
                                            <td style="width:230px; color:#fff;">
                                                @if ($s->active == 1)
                                                    <a href="{{ url('admin/lockStaff/'.$s->email) }}" class="btn btn-warning btn-sm">
                                                        <i class="ti-lock"></i>
                                                    </a>
                                                @endif
                                                @if ($s->active == 2)
                                                    <a href="{{ url('admin/lockStaff/'.$s->email) }}" class="btn btn-success btn-sm">
                                                        <i class="ti-unlock"></i>
                                                    </a>
                                                @endif

                                                <a class="btn btn-info btn-sm"
                                                    href="{{ url('admin/updateStaff/'.$s->email) }}">
                                                    <i class="ti-pencil"></i> Edit
                                                </a>
                                                <a onclick="return confirm('Are you sure you want to delete it?');"
                                                    class="btn btn-danger btn-sm"
                                                    href="{{ url('admin/deleteStaff/'.$s->email) }}">
                                                    <i class="ti-trash"></i> Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /# card -->

            </div>
            <!-- /# column -->
        </div>
        <!-- /# row -->

    </section>


@endsection
@section('script-section')

@endsection
