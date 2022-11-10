@extends('user.layout.layout')
@section('title', 'Shop')
@section('content')



    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Order History</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="text-center animate-box">
                @if (session('alert'))
                    <span class="" style="color: green">
                        {{ session('alert') }}
                    </span><br><br>
                @endif
            </div>

            <table class="table table-hover animate-box">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Total Amount</th>
                        <th>Payment term</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!--THÔNG TIN LỊCH SỬ ĐÃ ORDER-->
                    @foreach ($o as $oh)
                        <tr>
                            <td>{{ $oh->date }}</td>
                            <td>
                                @if ($oh->status == 'waiting')
                                    <span style="color: orange">waiting</span>
                                @else
                                    <span style="color: #33CC33">confirm</span>
                                @endif
                            </td>
                            <td>{{ $oh->total_amount }}</td>
                            <td>
                                @if ($oh->payment_term == 0)
                                    Cash
                                @else
                                    Online
                                @endif
                            </td>
                            <td>
                                <button style="padding: 5px 10px 5px 10px;" class="btn-info" data-toggle="modal"
                                    data-target="#myModal{{ $oh->id }}">
                                    <i class="ti-eye"></i> Detail</button>
                                @if ($oh->status == 'waiting')
                                    <button onclick="location.href=`{{ url('user_2/orderDelete/' . $oh->id) }}`"
                                        style="padding: 5px 10px 5px 10px;" class="btn-danger">
                                        <i class="ti-trash"></i> Cancellation</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="animate-box" style="text-align: right;">{{ $o->links('vendor.pagination.bootstrap-4') }}</div>
        </div>

        <!--ORDER DETAIL MODAL-->
        @foreach ($o as $oh)
            <div id="myModal{{ $oh->id }}" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title">Order detail</h3>
                        </div>
                        <div class="modal-body">
                            <!--THÔNG TIN ORDER-->
                            <h4>Order information</h4>
                            <table class="table table-hover">
                                <tr>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Total amount</th>
                                    <th>Address</th>
                                    <th>Payment term</th>
                                    <th>Delivered_date</th>
                                </tr>
                                <tr>
                                    <td>
                                        @if ($oh->status == 'waiting')
                                            <span style="color: orange">waiting</span>
                                        @else
                                            <span style="color: #33CC33">confirm</span>
                                        @endif
                                    </td>
                                    <td>{{ $oh->date }}</td>
                                    <td>{{ $oh->total_amount }}</td>
                                    <td>{{ $oh->shipping_address }}</td>
                                    <td>
                                        @if ($oh->payment_term == 0)
                                            Cash
                                        @else
                                            Online
                                        @endif
                                    </td>
                                    <td>{{ $oh->delivered_date }}</td>
                                </tr>
                            </table>
                            <hr>
                            <!--THÔNG TIN SẢN PHẨM ĐÃ ORDER-->
                            <h4>Ordered product information</h4>
                            <table class="table table-hover">
                                <tr>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                </tr>
                                @foreach ($oi as $oid)
                                    <!--KIỂM TRA DỰA VÀO PK VÀ FK,
                                            LẤY SẢN PHẨM ĐANG CÓ order_id THEO ĐƠN HÀNG-->
                                    @if ($oh->id == $oid->order_id)
                                        <tr>
                                            <td>{{ $oid->name }}</td>
                                            <td>
                                                <img src="{{ url('asset/admin/images/product/' . $oid->image_1) }}"
                                                    alt="" width="100" height="100">
                                            </td>
                                            <td>{{ $oid->qty }}</td>
                                            <td>$ {{ $oid->price }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr>
                                    <td colspan="4">Total</td>
                                    <td>$ {{ $oh->total_amount }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <br><br>




    @endsection
    @section('script-section')

    @endsection
