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
                        <h1>Contact Us</h1>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div id="fh5co-contact">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-md-push-1 animate-box">

                <div class="fh5co-contact-info">
                    <h3>Contact Information</h3>
                    <ul>
                        <li class="address">491/5 Lê Văn Sỹ, <br> Phường 12, quận 3, thành phố HCM</li>
                        <li class="phone"><a href="tel://1234567920">+ 0937655080</a></li>
                        <li class="email"><a href="mailto:info@yoursite.com">dinhduclt03@gmail.com</a></li>
                    </ul>
                </div>

            </div>
            <div class="col-md-6 animate-box">
                <h3>Get In Touch</h3>
                <form action="#">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <!-- <label for="fname">First Name</label> -->
                            <input type="text" id="fname" class="form-control" placeholder="Your firstname">
                        </div>
                        <div class="col-md-6">
                            <!-- <label for="lname">Last Name</label> -->
                            <input type="text" id="lname" class="form-control" placeholder="Your lastname">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="email">Email</label> -->
                            <input type="text" id="email" class="form-control" placeholder="Your email address">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="subject">Subject</label> -->
                            <input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="message">Message</label> -->
                            <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

{{-- MAP --}}

<iframe id="map"   style="padding-left: 16px; padding-right: 16px; border:none;"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.3267176085174!2d106.66429871411651!3d10.786269461963021!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f39e5fa506f%3A0xe9b82409cff3ad0d!2zNTgwIMSQLiBDw6FjaCBN4bqhbmcgVGjDoW5nIDgsIFBoxrDhu51uZyAxMSwgUXXhuq1uIDMsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmlldG5hbQ!5e0!3m2!1sen!2s!4v1657281732772!5m2!1sen!2s"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>


@endsection
@section('script-section')

@endsection
