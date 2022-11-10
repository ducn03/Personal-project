@extends('admin.layout.layout')
@section('title', 'Admin')
@section('content_admin')


<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Delete Order</h1>
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
                        <form class="form-valide" action="{{ url('admin/order/PostDeleteOrder/'.$o->id) }}" method="get" enctype="multipart/form-data">
                            {{-- EMAIL --}}
                            {{-- <div class="form-group row"> --}}
                                {{-- <label class="col-lg-4 col-form-label" for="val-username">Shipping email <span class="text-danger">*</span></label> --}}
                                {{-- <div class="col-lg-8"> --}}
                                    <input value="{{ $o->shipping_email }}" type="hidden" class="form-control" id="shipping_email" name="shipping_email" placeholder="">
                                {{-- </div>
                            </div> --}}
                            {{-- END EMAIL --}}
                            {{-- DESCRIPTION --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-suggestions">Reason for order cancellation <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <textarea required class="text_area" id="reason" name="reason" rows="6" placeholder="Enter description"></textarea>
                                </div>
                            </div>
                            {{-- END DESCRIPTION --}}


                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-danger"><i class="ti-trash"></i> Cancel order</button>
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
