@extends('user.layout.layout')
@section('title', 'Shop')
@section('content')

{{-- HEADER ABOUT --}}
<header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner" style="background-image:url({{ asset('asset/user/img/img_bg_2.jpg') }});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div class="display-t">
                    <div class="display-tc animate-box" data-animate-effect="fadeIn">
                        <h1>About Us</h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<div id="fh5co-about">
    <div class="container">
        <div class="about-content">
            <div class="row animate-box">
                <div class="col-md-6">
                    <div class="desc">
                        <h3>Company History</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quo est quis mollitia ratione magni assumenda repellat atque modi temporibus tempore ex. Dolore facilis ex sunt ea praesentium expedita numquam?</p>
                        <p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci rem dolorem nesciunt perferendis quae amet deserunt eum labore quidem minima.</p>
                    </div>
                    <div class="desc">
                        <h3>Mission &amp; Vission</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quo est quis mollitia ratione magni assumenda repellat atque modi temporibus tempore ex. Dolore facilis ex sunt ea praesentium expedita numquam?</p>
                        <p>Quos quia provident consequuntur culpa facere ratione maxime commodi voluptates id repellat velit eaque aspernatur expedita. Possimus itaque adipisci rem dolorem nesciunt perferendis quae amet deserunt eum labore quidem minima.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="img-responsive" src="{{ asset('asset/user/img/img_bg_1.jpg') }}" alt="about">
                </div>
            </div>
        </div>
        <div class="row animate-box">
            <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                <span>Productive Staff</span>
                <h2>Meet Our Team</h2>
                <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.</p>
            </div>
        </div>
        <div class="row">
                <div class="fh5co-staff animate-box">
                    <img src="{{ asset('asset/user/member_img/kaguya-avt.jpg') }}" alt="Free HTML5 Templates by gettemplates.co">
                    <h3>Nguyễn Đình Đức</h3>
                    <strong class="role">Dev</strong>
                    <p>.</p>
                    <ul class="fh5co-social-icons">
                        <li><a href="https://www.facebook.com/ma.hong.908132"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                        <li><a href="#"><i class="icon-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script-section')

@endsection