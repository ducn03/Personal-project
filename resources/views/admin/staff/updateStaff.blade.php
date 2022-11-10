@extends('admin.layout.layout')
@section('title', 'Admin')
@section('content_admin')


    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Update information staff</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Form Validation</li>
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
                    <div class="card-body">
                        <div class="form-validation">
                            <form class="form-valide" action="{{ url('admin/postStaffUpdate/'.$staff->email) }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{-- EMAIL --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Email <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input required type="text" class="form-control" id="email" name="email"
                                            value="{{ $staff->email }}" placeholder="Enter email..">
                                    </div>
                                </div>

                                {{-- STAFF NAME --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Name <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input required type="text" class="form-control" id="fullname" name="fullname"
                                            value="{{ $staff->fullname }}" placeholder="Enter fullname..">
                                    </div>
                                </div>

                                {{-- PHONE --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Tel <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input required type="number" class="form-control" id="tel" name="tel"
                                            value="{{ $staff->tel }}" placeholder="Enter password confirm..">
                                    </div>
                                </div>
                                {{-- END PHONE --}}

                                {{-- ADDRESS --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Address <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <textarea class="text_area" id="address" name="address" rows="4" placeholder="Enter address">{{ $staff->address }}</textarea>
                                    </div>
                                </div>
                                {{-- END ADDRESS --}}

                                {{-- AVATAR --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Avatar </label>
                                    <div class="col-lg-8">
                                        <img width="100px;" src="{{ asset('asset/admin/images/avatar/' . $staff->picture) }}"
                                            alt="">
                                        <input type="file" class="custom-fileinput" id="picture" name="picture">
                                        <label class="custom-filelabel" for="image">Choose Image</label>
                                    </div>
                                </div>
                                {{-- END AVATAR --}}

                                {{-- ROLE --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Role</label>
                                    <?php
                                    $disabled = $staff->role == 2 ? '' : 'disabled';
                                    ?>
                                    <div class="col-lg-8">
                                        <select class="form-control" name="role" id="txtrole" {{ $disabled }}>
                                            @if ($staff->role == 2)
                                                <option value="2">staff</option>
                                                <option value="3">admin</option>
                                            @else
                                                <option value="2">staff</option>
                                                <option value="3" selected>admin</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                {{-- END ROLE --}}

                                <div class="form-group row">
                                    <div class="col-lg-8 ml-auto">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
