@extends('user.layout.layout')
@section('title', 'Shop')
@section('content')



    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Feedback history</h2>
                </div>
            </div>
        </div>

        <div class="container">
        <table class="table table-hover animate-box">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Feedback</th>
                    <th>Staff reply</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!--THÔNG TIN LỊCH SỬ ĐÃ ORDER-->
                @foreach ($feedback as $f)
                <tr>
                    <td>{{ $f->created_date }}</td>
                    <td>{{ $f->comment }}</td>
                    <td>{{ $f->reply }}</td>
                    <td>
                        <button style="padding: 5px 10px 5px 10px;" class="btn-info"
                            data-toggle="modal" data-target="#myModal{{ $f->id }}">
                            <i class="glyphicon glyphicon-eye-open"></i> Feedback detail</button>
                        {{-- @if ($oh->status == 'waiting')
                        <button onclick="location.href=`{{ url('home/deleteOrder/' . $oh->id) }}`"
                            style="padding: 5px 10px 5px 10px; border-radius:15px;" class="btn-danger">
                            <i class="glyphicon glyphicon-trash"></i> Cancellation</button>
                    @endif --}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="animate-box" style="text-align: right;">{{ $feedback->links('vendor.pagination.bootstrap-4') }}</div>
    </div>

     <!--FEEDBACK DETAIL MODAL-->
    @foreach ($feedback as $f)
    <div id="myModal{{ $f->id }}" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Feedback detail</h4>
                </div>
                <div class="modal-body">
                    <!--THÔNG TIN FEEDBACK-->
                    <h4>Feedback</h4>
                    <table class="table table-hover">
                        <tr>
                            <th>Created date</th>
                            <th>Feedback</th>
                            <th>Staff reply</th>
                            <th>Reply</th>
                            <th>Date reply</th>
                        </tr>
                        <tr>
                            <td>{{ $f->created_date }}</td>
                            <td>{{ $f->comment }}</td>
                            <td>{{ $f->staff }}</td>
                            <td>{{ $f->reply }}</td>
                            <td>{{ $f->created_DateRep }}</td>
                        </tr>
                    </table>
                    <hr>
                    <!--THÔNG TIN SẢN PHẨM ĐÃ FEEDBACK-->
                    <h4>The product you have commented on</h4>
                    <table class="table table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                        </tr>
                        @foreach ($productfb as $pf)
                            <!--KIỂM TRA DỰA VÀO PK VÀ FK,
                                        LẤY SP CÓ PRODUCT_ID-->
                            @if ($f->product_id == $pf->id)
                                <tr>
                                    <td>{{ $pf->id }}</td>
                                    <td>{{ $pf->name }}</td>
                                    <td>
                                        <img src="{{ url('asset/admin/images/product/' . $pf->image_1) }}" alt="" width="100"
                                            height="100">
                                    </td>
                                    <td>$ {{ $pf->price }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </table><hr>
                    <a href="{{ url('/productDetail/'.$f->product_id) }}">Come see feedback -></a>
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
