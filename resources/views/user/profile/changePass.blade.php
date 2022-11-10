@extends('user.layout.layout')
@section('title', 'Shop')
@section('content')



    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <h2>Change password</h2>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center animate-box">
                    @if (session('passT'))
                        <span class="" style="color: green">
                            {{ session('passT') }}
                        </span><br><br>
                    @endif
                </div>
                <div class="col-md-12 text-center animate-box">
                    @if (session('passF'))
                        <span class="" style="color: red">
                            Error: {{ session('passF') }}
                        </span><br><br>
                    @endif
                </div>
            </div>

            <form action="{{ url('user_2/postChangePass/'.session('user_2')->id) }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12 text-center animate-box">
                        Old password <input class="form-control" type="password" name="old_pass"
                            value="" required>
                    </div>
                    <div class="col-md-12 text-center animate-box">
                        New password <input class="form-control" type="password" name="new_pass"
                            value="" required>
                    </div>
                    <div class="col-md-12 text-center animate-box">
                        Confirm password <input class="form-control" type="password" name="confirm pass"
                            value="">
                    </div>
                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-12 text-center animate-box">
                        <input type="submit" class="btn btn-primary btn-lg" value="Change">
                    </div>
                </div>
            </form>
        </div>

        <br> <br>





    @endsection
    @section('script-section')

    @endsection
