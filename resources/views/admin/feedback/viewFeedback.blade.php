@extends('admin.layout.layout')
@section('title', 'Admin')
@section('content_admin')

    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Feedback</h1>
                </div>
            </div>
        </div>

        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Feedback</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <section id="main-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <b>Not answered</b><br>
                    <label for="">
                        Search: <input type="text" name="" id="">
                    </label>
                    <div class="bootstrap-data-table-panel">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        {{-- <th>Id</th> --}}
                                        <th>Product_id</th>
                                        <th>Member_id</th>
                                        <th>Create_date</th>
                                        <th>Comment</th>
                                        {{-- <th>Staff_id</th>
                                        <th>Reply</th>
                                        <th>Time Reply</th> --}}
                                        <th style="min-width:140px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feedback as $f)
                                        @if ($f->reply == null)
                                            <tr>
                                                {{-- <td>{{ $f->id }}</td> --}}
                                                <td>{{ $f->product_id }}</td>
                                                <td>{{ $f->account_id }}</td>
                                                <td>{{ $f->created_date }}</td>
                                                <td>{{ $f->comment }}</td>
                                                {{-- <td>{{ $f->staff_id }}</td>
                                                <td>{{ $f->reply }}</td>
                                                <td>{{ $f->created_DateRep }}</td> --}}
                                                <td class="text-right">
                                                    <a class="btn btn-info btn-sm" href="{{ url('admin/replyFeedback/' . $f->id) }}">
                                                        <i class="ti-pencil"></i> Reply
                                                    </a>

                                                    @if (session('admin')->role == 3)
                                                        <a onclick="return confirm('Are you sure you want to delete it?');" class="btn btn-danger btn-sm" href="{{ url('admin/deleteFeedback/' . $f->id) }}">
                                                            <i class="ti-trash"></i> Delete
                                                        </a>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div style="text-align: right;">{{ $feedback->links('vendor.pagination.bootstrap-4') }}</div>
                </div>
                <!-- /# card -->
            </div>

            <br><br><br><br>

            <div class="col-lg-12">
                <div class="card">
                    <b>Answered</b><br>
                    <label for="">
                        Search: <input type="text" name="" id="">
                    </label>
                    <div class="bootstrap-data-table-panel">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        {{-- <th>Id</th> --}}
                                        <th>Product_id</th>
                                        <th>Member_id</th>
                                        <th>Create_date</th>
                                        <th>Comment</th>
                                        <th>Staff</th>
                                        <th>Reply</th>
                                        {{-- <th>Staff_id</th>
                                        <th>Reply</th>
                                        <th>Time Reply</th> --}}
                                        <th style="min-width:140px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($feedback as $f)
                                    @if ($f->reply != null)
                                            <tr>
                                                {{-- <td>{{ $f->id }}</td> --}}
                                                <td>{{ $f->product_id }}</td>
                                                <td>{{ $f->account_id }}</td>
                                                <td>{{ $f->created_date }}</td>
                                                <td>{{ $f->comment }}</td>
                                                <td>{{ $f->staff }}</td>
                                                <td>{{ $f->reply }}</td>
                                                {{-- <td>{{ $f->staff_id }}</td>
                                                <td>{{ $f->reply }}</td>
                                                <td>{{ $f->created_DateRep }}</td> --}}
                                                <td class="text-right">
                                                    <a class="btn btn-info btn-sm" href="{{ url('admin/replyFeedback/' . $f->id) }}">
                                                        <i class="ti-pencil"></i> Reply
                                                    </a>

                                                    @if (session('admin')->role == 3)
                                                        <a onclick="return confirm('Are you sure you want to delete it?');" class="btn btn-danger btn-sm" href="{{ url('admin/deleteFeedback/' . $f->id) }}">
                                                            <i class="ti-trash"></i> Delete
                                                        </a>
                                                    @endif


                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>

                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div style="text-align: right;">{{ $feedback->links('vendor.pagination.bootstrap-4') }}</div>
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
