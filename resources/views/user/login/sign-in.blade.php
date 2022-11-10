@extends('user.layout.layout')
@section('title', 'Shop')
@section('content')



    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Login</h2>
                </div>
            </div>
        </div>
        {{-- THÔNG BÁO đăng ký KHÔNG ĐƯỢC --}}
        @if (session('loi'))
            <div style="text-align:center;" class="animate-box">
                <br>
                <span class="" style="color: red">
                    Error: {{ session('loi') }}
                </span>
            </div>
        @endif
        {{-- END THÔNG BÁO REGISTER_FAIL --}}
         <!--THÔNG BÁO ĐĂNG NHẬP LỖI-->
         @if (session('message'))
         <div style="text-align:center;" class="animate-box">
             <br>
             <span class="" style="color: red">
                 Error: {{ session('message') }}
             </span>
         </div><br>
     @endif
     {{-- END THÔNG BÁO LỖI --}}
        <div class="row" style="padding: 0 20% 0 20%;">
            <div class="col-md-12 text-center animate-box">
                <form action="{{ url('/checkLoginAdmin') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="lname">Email</label>
                            <input required type="email" name="email" id="email" class="form-control"
                                placeholder="Your email address">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="email">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Your password">
                        </div>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Login" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>



@endsection
@section('script-section')

@endsection
