@extends('user.layout.layout')
@section('title', 'Shop')
@section('content')



    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Change information</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <form action="{{ url('user_2/postChangeInfo/'.session('user_2')->id) }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 text-center animate-box">
                        Name <input class="form-control" type="text" name="fullname" id="fullname"
                            value="{{ session('user_2')->fullname }}">
                    </div>
                    <div class="col-md-6 text-center animate-box">
                        Email <input class="form-control" type="text" name="email" id="email"
                            value="{{ session('user_2')->email }}">
                    </div>
                    <div class="col-md-6 text-center animate-box">
                        Phone <input class="form-control" type="text" name="tel" id="tel"
                            value="{{ session('user_2')->tel }}">
                    </div>
                    <div class="col-md-6 text-center animate-box">
                        Address <input class="form-control" type="text" name="address" id="address"
                            value="{{ session('user_2')->address }}">
                    </div>
                    <div class="col-md-6 text-center animate-box">
                        Image <br><img class="img-fluid" src="{{ asset('asset/user/member_img/' . session('user_2')->picture) }}" width="100px;"/>
                        <input type="file" class="custom-fileinput" id="picture" name="picture">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12 text-center animate-box">
                        <input type="submit" class="btn btn-primary btn-lg" value="Update">
                    </div>
                </div>
            </form>
        </div>

        <br> <br>





    @endsection
    @section('script-section')

    @endsection
