@extends('admin.layout.layout')
@section('title', 'Admin')
@section('content_admin')


<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Create product</h1>
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
                        <form class="form-valide" action="postStaffCreate" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- EMAIL --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input required type="text" class="form-control" id="email" name="email" placeholder="Enter email..">
                                </div>
                            </div>

                            {{-- STAFF NAME --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Name <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input required type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter fullname..">
                                </div>
                            </div>

                            {{-- PASSWORD --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Password <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input required type="password" class="form-control" id="password" name="password" placeholder="Enter password..">
                                </div>
                            </div>

                            {{-- PASSWORD CONFIRM --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Password confirm <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input required type="password" class="form-control" id="passwordConfirm" name="passwordConfirm" placeholder="Enter password confirm..">
                                </div>
                            </div>

                             {{-- PHONE --}}
                             <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Tel <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input required type="number" class="form-control" id="tel" name="tel" placeholder="Enter password confirm..">
                                </div>
                            </div>
                            {{-- END PHONE --}}

                            {{-- ADDRESS --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-suggestions">Address <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <textarea class="text_area" id="address" name="address" rows="4" placeholder="Enter address"></textarea>
                                </div>
                            </div>
                            {{-- END ADDRESS --}}

                            {{-- AVATAR --}}
                             <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Avatar </label>
                                <div class="col-lg-8">
                                    <input type="file" class="custom-fileinput" id="picture" name="picture">
                                        <label class="custom-filelabel" for="image">Choose Image</label>
                                </div>
                            </div>
                            {{-- END AVATAR --}}

                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Create</button>
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
    .text_area{
        width: 100%;
        border-color: #E7E7E7;
        padding: 10px;
        font-size: medium;
    }
    .text_area:focus{
        outline: none;
        border-color: #878787;

    }
</style>

@endsection
@section('script-section')

@endsection
