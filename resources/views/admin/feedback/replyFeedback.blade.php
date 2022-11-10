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
                        <li class="breadcrumb-item active">Reply feedback</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section id="main-content">
        <div class="row">
            <!-- general form elements -->
            @if (session('message'))
                <span class="alert alert-danger" style="color: #fff;">
                    {{ session('message') }}
                </span><br><br>
            @endif
            @php
                use Carbon\Carbon;
                $mytime = Carbon::now();
            @endphp
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="{{ url('admin/postReplyFeedback/' . $f->id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <table class="table table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                    </tr>
                                    <tr>
                                        <td>{{ $pf->name }}</td>
                                        <td style="text-align:left;"><img src="{{ url('asset/admin/images/product/' . $pf->image_1) }}" alt="" width="100px">
                                        </td>
                                    </tr>
                                </table>
                                {{-- FEEDBACK --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Feedback <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input required type="text" class="form-control" id="comment" name="comment"
                                            placeholder="" value="{{ $f->comment }}" readonly>
                                    </div>
                                </div>
                                {{-- END FEEDBACK NAME --}}

                                {{-- STAFF --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-number">Staff<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @if ($f->staff == null)
                                            <input type="text" class="form-control" id="staff_id" name="staff"
                                                placeholder="" value="{{ session('admin')->fullname }}" readonly>
                                        @else
                                            <input type="text" class="form-control" id="staff_id" name="staff"
                                                placeholder="" value="{{ $f->staff }}" readonly>
                                        @endif
                                    </div>
                                </div>
                                {{-- END STAFF --}}

                                {{-- REPLY --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-select2">Reply <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <textarea class="text_area" id="reply" name="reply" rows="6" placeholder="">{{ $f->reply }}</textarea>
                                    </div>
                                </div>
                                {{-- END REPLY --}}

                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Reply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .text_area {
            width: 100%;
            border-color: #E7E7E7;
            padding: 10px;
            font-size: medium;
        }

        .text_area:focus {
            outline: none;
            border-color: #878787;

        }
    </style>




@endsection
@section('script-section')

@endsection
