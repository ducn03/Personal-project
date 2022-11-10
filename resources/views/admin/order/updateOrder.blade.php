@extends('admin.layout.layout')
@section('title', 'Admin')
@section('content_admin')


    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Update order (ID: {{ $o->id }})</h1>
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
                            <form class="form-valide" action="{{ url('admin/postUpdateOrder/' . $o->id) }}" method="post"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{-- ORDER --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-username">Date <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input required type="text" class="form-control" id="date" name="date"
                                            placeholder="" value="{{ $o->date }}" readonly>
                                    </div>
                                </div>
                                {{-- END DATE NAME --}}

                                {{-- STATUS --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-number">Status <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @if ($o->status == 'waiting')
                                            <select class="js-select2 form-control" id="status" name="status"
                                                style="width: 100%;" data-placeholder="Choose one..">
                                                <option value="waiting" selected>Waiting</option>
                                                <option value="confirm">Confirm</option>
                                            </select>
                                        @else
                                            <select disabled class="js-select2 form-control" id="status" name="status"
                                                style="width: 100%;" data-placeholder="Choose one..">
                                                <option value="waiting">Waiting</option>
                                                <option value="confirm" selected>Confirm</option>
                                            </select>
                                        @endif
                                    </div>
                                </div>
                                {{-- END STATUS --}}
                                {{-- TOTAL AMOUNT --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-suggestions">Total amount <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control" id="total_amount" name="total_amount"
                                            placeholder="" value="{{ $o->total_amount }}" readonly>
                                    </div>
                                </div>
                                {{-- END TOTAL AMOUNT --}}
                                {{-- NOTE --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-select2">Note <span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <textarea class="text_area" id="note" name="note" rows="6" placeholder="" readonly>{{ $o->note }}</textarea>
                                    </div>
                                </div>
                                {{-- END NOTE --}}

                                {{-- EMAIL --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-number">Email<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="textr" class="form-control" id="shipping_email" name="shipping_email"
                                            placeholder="" value="{{ $o->shipping_email }}" readonly>
                                    </div>
                                </div>
                                {{-- END EMAIL --}}

                                {{-- ADDRESS --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-number">Address<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input type="text" class="form-control" id="shipping_address"
                                            name="shipping_address" placeholder="" value="{{ $o->shipping_address }}"
                                            readonly>
                                    </div>
                                </div>
                                {{-- END ADDRESS --}}

                                {{-- STAFF --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-number">Staff<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        @if ($o->staff_id == null)
                                            <input type="text" class="form-control" id="staff_id" name="staff_id"
                                                placeholder="" value="{{ session('admin')->fullname }}" readonly>
                                        @else
                                            <input type="text" class="form-control" id="staff_id" name="staff_id"
                                                placeholder="" value="{{ $o->staff_id }}" readonly>
                                        @endif
                                    </div>
                                </div>
                                {{-- END STAFF --}}

                                {{-- Delivered date --}}
                                <div class="form-group row">
                                    <label class="col-lg-4 col-form-label" for="val-number">Delivered date<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input required type="date" class="form-control" id="delivered_date"
                                            name="delivered_date" placeholder="" value="{{ $o->delivered_date }}">
                                    </div>
                                </div>
                                {{-- Delivered date --}}

                                <table class="table table-hover">
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                    @foreach ($order_item as $oi)
                                        <tr>
                                            <td>{{ $oi->name }}</td>
                                            <td><img width="100px"
                                                    src="{{ url('asset/admin/images/product/' . $oi->image_1) }}" /></td>
                                            <td>{{ $oi->qty }}</td>
                                            <td>{{ $oi->price }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3">Total</td>
                                        <td>$ {{ $o->total_amount }}</td>
                                    </tr>
                                </table><br>

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
