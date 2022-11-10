@extends('admin.layout.layout')
@section('title', 'Admin')
@section('content_admin')

    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Order</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Order</a></li>
                        <li class="breadcrumb-item active">Table-Export</li>
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
                <div class="card2">
                    <div class="bootstrap-data-table-panel">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-hover">
                                <thead>
                                    <tr>

                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Total Amount</th>
                                        <th>Phone</th>
                                        <th>Note</th>
                                        <th>Shipping-email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order as $o)
                                        <tr>

                                            <td>{{ $o->date }}</td>
                                            <td style="color: #333;">
                                                @if ($o->status == 'waiting')
                                                    <span
                                                        style="background-color: orange; padding:5px; border-radius: 5px; color: #fff;">
                                                        {{ $o->status }}</span>
                                                @else
                                                    <span
                                                        style="background-color: #33CC33; padding:5px; border-radius: 5px; color: #fff;">
                                                        {{ $o->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ $o->total_amount }}$</td>
                                            <td>{{ $o->phone }}</td>
                                            <td>{{ $o->note }}</td>
                                            <td>{{ $o->shipping_email }}</td>
                                            <td style="width:230px; color:#fff;">
                                                <a data-toggle="modal" data-target="#myModal{{ $o->id }}"
                                                    class="btn btn-warning btn-sm">
                                                    <i class="ti-eye"></i> View
                                                </a>
                                                <a class="btn btn-info btn-sm" href="{{ url('admin/updateOrder/'.$o->id) }}">
                                                    <i class="ti-pencil"></i> Edit
                                                </a>

                                                <a onclick="return confirm('Are you sure you want to delete it?');" class="btn btn-danger btn-sm" href="{{ url('admin/order/deleteOrder/'.$o->id) }}">
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


        @foreach ($order as $o)
            {{-- MODAL VIEW ORDER --}}
            <div id="myModal{{ $o->id }}" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Order detail</h4>
                        </div>
                        <div class="modal-body">
                            {{-- ID --}}
                            <div>
                                <b>ID</b>: {{ $o->id }}
                            </div>
                            {{-- Status --}}
                            <div>
                                <b>Status</b>:
                                @if ($o->status == 'waiting')
                                    <span style="background-color: orange; padding:5px; border-radius: 5px; color: #fff;">
                                        {{ $o->status }}</span>
                                @else
                                    <span style="background-color: #33CC33; padding:5px; border-radius: 5px; color: #fff;">
                                        {{ $o->status }}</span>
                                @endif
                            </div>
                            {{-- Date --}}
                            <div>
                                <b>Date</b>: {{ $o->date }}
                            </div>
                            {{-- Total amount --}}
                            <div>
                                <b>Total amount</b>: {{ $o->total_amount }}$
                            </div>
                            {{-- Phone --}}
                            <div>
                                <b>Phone</b>: {{ $o->phone }}
                            </div>
                            {{-- Note --}}
                            <div>
                                <b>Note</b>: {{ $o->note }}
                            </div>
                            {{-- shipping email --}}
                            <div>
                                <b>Shipping email</b>: {{ $o->shipping_email }}
                            </div>
                            {{-- shipping address --}}
                            <div>
                                <b>Shipping address</b>: {{ $o->shipping_address }}
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END MODAL VIEW MODAL --}}
        @endforeach

    </section>

    <style>
        .card2{
            padding: 6px;
            background-color: #fff;
            box-shadow: 0 5px 20px rgb(0 0 0 / 10%);
            border-radius: 3px;
        }
    </style>

@endsection
@section('script-section')

@endsection
