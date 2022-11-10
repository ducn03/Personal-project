@extends('user.layout.layout')
@section('title', 'Shop')
@section('content')



    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Become our customer</span>
                    <h2>Register.</h2>
                    <p>
                        Here everything's better.</p>
                </div>
            </div>
        </div>
        {{-- THÔNG BÁO đăng ký KHÔNG ĐƯỢC --}}
        @if (session('loi'))
            <div style="text-align:center;">
                <br>
                <span class="alert alert-danger" style="color: red">
                    Error: {{ session('loi') }}
                </span>
            </div><br>
        @endif
        {{-- END THÔNG BÁO REGISTER_FAIL --}}
        <div class="row" style="padding: 0 20% 0 20%;">
            <div class="col-md-12 text-center animate-box">
                <form action="postSignUp" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="fname">Fullname</label>
                            <input required type="text" name="name" id="name" class="form-control"
                                placeholder="Your fullname">
                        </div>
                        <div class="col-md-6">
                            <label for="lname">Email</label>
                            <input required type="email" name="email" id="email" class="form-control"
                                placeholder="Your email address">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="email">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Your password">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Password confirm</label>
                            <input type="password" name="password_confirm" id="password_confirm" class="form-control"
                                placeholder="Password confirm">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="email">Tel</label>
                            <input type="number" name="tel" id="tel" class="form-control"
                                placeholder="Your phone number">
                        </div>
                        <div class="col-md-6">
                            <label for="email">Address</label>
                            <input type="text" name="address" id="address" class="form-control"
                                placeholder="Your address">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label>Avatar</label>
                            <input type="file" id="picture" name="picture">
                        </div>
                    </div>


                    <div class="form-group">
                        <input type="submit" value="Register" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>



@endsection
@section('script-section')

@endsection
