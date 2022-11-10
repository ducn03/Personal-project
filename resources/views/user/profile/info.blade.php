@extends('user.layout.layout')
@section('title', 'Shop')
@section('content')



    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Profile</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="fh5co-staff animate-box">
                <img src="{{ asset('asset/user/member_img/' . session('user_2')->picture) }}"
                    alt="Free HTML5 Templates by gettemplates.co">
                <h3>{{ session('user_2')->fullname }}</h3>
                <strong class="role">User</strong>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center animate-box">
                <a style="width: 300px" href="{{ url('user_2/changeInfo/'.session('user_2')->id) }}" class="btn btn-primary btn-lg">Change information</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 text-center animate-box">
                    Name <input class="form-control" type="text" name="name" id="name"
                        value="{{ session('user_2')->fullname }}" readonly>
                </div>
                <div class="col-md-6 text-center animate-box">
                    Email <input class="form-control" type="text" name="email" id="email"
                        value="{{ session('user_2')->email }}" readonly>
                </div>
                <div class="col-md-6 text-center animate-box">
                    Phone <input class="form-control" type="text" name="tel" id="tel"
                        value="{{ session('user_2')->tel }}" readonly>
                </div>
                <div class="col-md-6 text-center animate-box">
                    Address <input class="form-control" type="text" name="address" id="address"
                        value="{{ session('user_2')->address }}" readonly>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col-md-4 text-center animate-box">
                    <a style="width: 300px" href="{{ url('user_2/orderHistory/'.session('user_2')->id) }}" class="btn btn-primary btn-outline btn-lg">Order History</a>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <a style="width: 300px" href="{{ url('user_2/feedbackHistory/'.session('user_2')->id) }}" class="btn btn-primary btn-outline btn-lg">Feedback History</a>
                </div>
                <div class="col-md-4 text-center animate-box">
                    <a style="width: 300px" href="{{ url('user_2/changePass/'.session('user_2')->id) }}" class="btn btn-primary btn-outline btn-lg">Change Password</a>
                </div>
            </div>
        </div>

        <br> <br>





    @endsection
    @section('script-section')

    @endsection
