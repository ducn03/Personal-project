@extends('admin.layout.layout')
@section('title', 'Admin')
@section('content_admin')

<div class="row">
    <div class="col-lg-8 p-r-0 title-margin-right">
        <div class="page-header">
            <div class="page-title">
                <h1>Product</h1>
            </div>
        </div>
    </div>
    <!-- /# column -->
    <div class="col-lg-4 p-l-0 title-margin-left">
        <div class="page-header">
            <div class="page-title">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
            <div class="card" >
                <div class="bootstrap-data-table-panel">
                    <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-hover">
                            <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Inventory_qty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $p)
                                <tr>

                                    <td>{{ $p->name }}</td>
                                    <td>{{ $p->price }}</td>
                                    <td>{{ $p->description }}</td>
                                    <td>
                                        @if ($p->category_id == 1)
                                        cooking equipment
                                        @elseif ($p->category_id == 2)
                                        dispensing equipment
                                        @elseif ($p->category_id == 3)
                                        kitchen equipment
                                        @else
                                        household appliances
                                        @endif
                                    </td>
                                        <td><img width="100px" src="{{ url('asset/admin/images/product/' . $p->image_1) }}" /></td>

                                    <td>{{ $p->inventory_qty }}</td>
                                    <td style="width:160px;">
                                        <a class="btn btn-info btn-sm"
                                                href="{{ url('admin/updateProduct/'.$p->id) }}">
                                                <i class="ti-pencil"></i> Edit
                                            </a>

                                                <a onclick="return confirm('Are you sure you want to delete it?');" class="btn btn-danger btn-sm"
                                                    href="">
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

