@extends('user.layout.layout')
@section('title', 'Shop')
@section('content')

    {{-- HEADER ABOUT --}}
    <header id="fh5co-header" class="fh5co-cover fh5co-cover-sm" role="banner"
        style="background-image:url({{ asset('asset/user/img/img_bg_2.jpg') }});">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <div class="display-t">
                        <div class="display-tc animate-box" data-animate-effect="fadeIn">
                            <h1>product detail</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-product">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 animate-box">
                    <div class="owl-carousel owl-carousel-fullwidth product-carousel">
                        <div class="item">
                            <div class="active text-center">
                                <figure>
                                    <img src="{{ asset('asset/admin/images/product/' . $products->image_1) }}"
                                        alt="user">
                                </figure>
                            </div>
                        </div>
                        <div class="item">
                            <div class="active text-center">
                                <figure>
                                    <img src="{{ asset('asset/admin/images/product/' . $products->image_2) }}"
                                        alt="user">
                                </figure>
                            </div>
                        </div>
                        <div class="item">
                            <div class="active text-center">
                                <figure>
                                    <img src="{{ asset('asset/admin/images/product/' . $products->image_3) }}"
                                        alt="user">
                                </figure>
                            </div>
                        </div>
                        <div class="item">
                            <div class="active text-center">
                                <figure>
                                    <img src="{{ asset('asset/admin/images/product/' . $products->image_4) }}"
                                        alt="user">
                                </figure>
                            </div>
                        </div>
                        <div class="item">
                            <div class="active text-center">
                                <figure>
                                    <img src="{{ asset('asset/admin/images/product/' . $products->image_5) }}"
                                        alt="user">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="row animate-box">
                        <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                            <h2>{{ $products->name }}</h2>
                            <p>
                                <a href="{{ url('/add-to-cart/' . $products->id) }}"
                                    class="btn btn-primary btn-outline btn-lg">Add to Cart</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="fh5co-tabs animate-box">
                        <ul class="fh5co-tab-nav">
                            <li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i
                                            class="icon-file"></i></span><span class="hidden-xs">Product Details</span></a>
                            </li>
                            <li><a href="#" data-tab="2"><span class="icon visible-xs"><i
                                            class="icon-bar-graph"></i></span><span
                                        class="hidden-xs">Specification</span></a></li>
                            <li><a href="#" data-tab="3"><span class="icon visible-xs"><i
                                            class="icon-star"></i></span><span class="hidden-xs">Feedback &amp;
                                        Ratings</span></a></li>
                        </ul>

                        <!-- Tabs -->
                        <div class="fh5co-tab-content-wrap">

                            <div class="fh5co-tab-content tab-content active" data-tab-content="1">
                                <div class="col-md-10 col-md-offset-1">
                                    <span class="price">SRP: ${{ $products->price }}</span>

                                    {!! $products->description !!}

                                </div>
                            </div>

                            <div class="fh5co-tab-content tab-content" data-tab-content="2">
                                <div class="col-md-10 col-md-offset-1">
                                    <h3>Product Specification</h3>
                                    <ul>
                                        <li>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci
                                            dignissimos consectetur magni quas eius</li>
                                        <li>adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta
                                            eligendi</li>
                                        <li>Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                        <li>Magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit?
                                            Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                    </ul>
                                    <ul>
                                        <li>Paragraph placeat quis fugiat provident veritatis quia iure a debitis adipisci
                                            dignissimos consectetur magni quas eius</li>
                                        <li>adipisci dignissimos consectetur magni quas eius nobis reprehenderit soluta
                                            eligendi</li>
                                        <li>Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                        <li>Magni quas eius nobis reprehenderit soluta eligendi quo reiciendis fugit?
                                            Veritatis tenetur odio delectus quibusdam officiis est.</li>
                                    </ul>

                                </div>
                            </div>

                            <div class="fh5co-tab-content tab-content" data-tab-content="3">
                                <div class="col-md-10 col-md-offset-1">
                                    <h3>Buyers</h3>

                                    {{-- PHƯƠNG THỨC LẤY TIME HIỆN TẠI --}}
                                    @php
                                        use Carbon\Carbon;
                                        $mytime = Carbon::now();
                                    @endphp

                                    @if (session('user_2'))
                                        <div class="row">
                                            <div class="col-md-12 animate-box text-center">
                                                {{-- ĐƯỜNG DẪN --}}
                                                <form action="{{ url('user_2/postFeedback/' . $products->id) }}">
                                                    {{-- AVT --}}
                                                    <img style="width: 50px; border-radius:50%;"
                                                        src="{{ asset('asset/user/member_img/kaguya-avt.jpg') }}"
                                                        alt="">
                                                    {{-- feedback --}}
                                                    <textarea required type="text" name="feedback" id="feedback" class="feedbackInput" placeholder="Your feedback"
                                                        rows="2"></textarea>
                                                    {{-- LẤY ID --}}
                                                    <input class="form-control" type="hidden" name="account_id"
                                                        id="account_id" value="{{ session('user_2')->id }}">
                                                    {{-- LẤY TIME CREATE --}}
                                                    <input type="hidden" name="created_date" id="created_date"
                                                        value="{{ $mytime }}">
                                                    {{-- submit --}}
                                                    <input type="submit" value="send" class="btn btn-primary">
                                                </form>
                                            </div><br>

                                        </div>
                                    @else
                                    @endif
                                    <br><br>

                                    <div class="feed">

                                        @foreach ($fb as $f)
                                            <div>
                                                <div>
                                                    <blockquote>
                                                        <p>{{ $f->comment }}</p>
                                                    </blockquote>
                                                    <h3>
                                                        <img style="width: 50px; border-radius:50%;"
                                                            src="{{ asset('asset/user/member_img/' . $f->picture) }}"
                                                            alt="">
                                                        {{ $f->fullname }}
                                                        - <span class="date">{{ $f->created_date }}</span>
                                                    </h3>
                                                </div>
                                                {{-- Reply --}}
                                                {{-- NẾU BÊN KIA ĐÃ REPLY R THÌ SHOW RA KO THÌ THÔI --}}
                                                @if ($f->reply != null)
                                                    <div class="reply">
                                                        <blockquote>
                                                            <p>{{ $f->reply }}</p>
                                                        </blockquote>
                                                        <h3>
                                                            <img style="width: 50px; border-radius:50%;"
                                                                src="{{ asset('asset/user/member_img/kaguya-avt.jpg') }}"
                                                                alt="">
                                                            {{ $f->staff }}
                                                            - <span class="date">{{ $f->created_DateRep }}</span>
                                                        </h3>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                        <div  class="animate-box" style="text-align: right;font-size: x-large;">{{ $fb->links('vendor.pagination.semantic-ui') }}</div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .feedbackInput {
            width: 55%;
            padding-left: 10px;
            padding-right: 10px;
            line-height: 1.42857;
            color: #555555;
            transition: border-color ease-in-out 0.15s, box-shadow ease-in-out 0.15s;
            background: transparent;
            border: 2px solid rgba(0, 0, 0, 0.1);
            /* height:54px; */
            font-size: 18px;
            font-weight: 300;
            margin-bottom: -4%;
        }

        .feedbackInput:active,
        .feedbackInput:focus {
            outline: none;
            box-shadow: none;
            border-color: #d1c286;
        }

        .date {
            color: #777777;
            font-size: medium;
        }

        .reply {
            margin-left: 10%;
        }
    </style>
    <br><br><br><br>

@endsection
@section('script-section')

@endsection
