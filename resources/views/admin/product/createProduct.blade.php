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
                        <form class="form-valide" action="postCreateProduct" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- PRODUCT NAME --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Product's name <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input required type="text" class="form-control" id="name" name="name" placeholder="Enter a product name..">
                                </div>
                            </div>
                            {{-- END PRODUCT NAME --}}
                            {{-- <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-email">Email <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Your valid email..">
                                </div>
                            </div> --}}
                            {{-- PRICE --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-number">Price <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input required type="number" class="form-control" id="price" name="price" placeholder="Enter a number">
                                </div>
                            </div>
                            {{-- END PRICE --}}
                            {{-- DESCRIPTION --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-suggestions">Description <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <textarea class="text_area" id="description" name="description" rows="6" placeholder="Enter description"></textarea>
                                </div>
                            </div>
                            {{-- END DESCRIPTION --}}
                            {{-- CATEGORY --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-select2">Category <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <select required class="js-select2 form-control" id="category_id" name="category_id" style="width: 100%;" data-placeholder="Choose one..">
                                        <option></option>
                                        <option value="1">Cooking equipment</option>
                                        <option value="2">Dispensing equipment</option>
                                        <option value="3">Kitchen equipment</option>
                                        <option value="4">Household appliances</option>
                                    </select>
                                </div>
                            </div>
                            {{-- END CATEGORY --}}

                            {{-- IMAGE1 --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Image_1 </label>
                                <div class="col-lg-8">
                                    <input type="file" class="custom-fileinput" id="image_1" name="image_1">
                                        <label class="custom-filelabel" for="image">Choose Image</label>
                                </div>
                            </div>
                            {{-- END IMAGE1 --}}

                            {{-- IMAGE2 --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Image_2 </label>
                                <div class="col-lg-8">
                                    <input type="file" class="custom-fileinput" id="image_2" name="image_2">
                                        <label class="custom-filelabel" for="image">Choose Image</label>
                                </div>
                            </div>
                            {{-- END IMAGE2 --}}

                            {{-- IMAGE3 --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Image_3 </label>
                                <div class="col-lg-8">
                                    <input type="file" class="custom-fileinput" id="image_3" name="image_3">
                                        <label class="custom-filelabel" for="image">Choose Image</label>
                                </div>
                            </div>
                            {{-- END IMAGE3 --}}

                            {{-- IMAGE4 --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Image_4 </label>
                                <div class="col-lg-8">
                                    <input type="file" class="custom-fileinput" id="image_4" name="image_4">
                                        <label class="custom-filelabel" for="image">Choose Image</label>
                                </div>
                            </div>
                            {{-- END IMAGE4 --}}

                            {{-- IMAGE5 --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-username">Image_5 </label>
                                <div class="col-lg-8">
                                    <input type="file" class="custom-fileinput" id="image_5" name="image_5">
                                        <label class="custom-filelabel" for="image">Choose Image</label>
                                </div>
                            </div>
                            {{-- END IMAGE5 --}}

                            {{-- inventory_qty --}}
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="val-number">inventory_qty <span class="text-danger">*</span></label>
                                <div class="col-lg-6">
                                    <input type="number" class="form-control" id="inventory_qty" name="inventory_qty" placeholder="Enter a number">
                                </div>
                            </div>
                            {{-- END INVENTORY_QTY --}}

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
