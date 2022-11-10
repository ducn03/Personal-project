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
                            <h1>{{ $tle->name }}</h1>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div id="fh5co-product">
        <div class="container">
            <div class="row animate-box">
                <div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
                    <span>Cool Stuff</span>
                    <h2>{{ $tle->name }}</h2>
                    <p>
                        Trusted shopping place – Everyone's friend.</p>
                </div>
            </div>


            {{-- FILTER --}}
            <div class="row">
                {{-- SEARCH NAME --}}
                <div class="col-md-6 text-center animate-box" style="padding: 0 5% 0 5%">
                    <form action="{{ url('/srCategoryProductName/'.$tle->id) }}">
                        <div class="row">
                            <div class="col-md-10 text-center animate-box">
                                <input name="srName" type="text" class="form-control" placeholder="Search by name">
                            </div>
                            <div class="col-md-2 text-center animate-box">
                                <button class="btn-primary btn-outline btn-lg" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- END SEARCH NAME --}}
                {{-- SELECT --}}
                <div class="col-md-6 text-center animate-box" style="padding: 0 5% 0 5%">
                    <form action="{{ url('/srCategoryProductFilter/'.$tle->id) }}">
                        <div class="row">
                            <div class="col-md-10 text-center animate-box">
                                <select class="form-control" id="filter" name="filter" style="width: 100%;"
                                    data-placeholder="Choose one..">
                                    <option></option>
                                    <option value="high">High</option>
                                    <option value="low">Low</option>
                                </select>
                            </div>
                            <div class="col-md-2 text-center animate-box">
                                <button class="btn-primary btn-outline btn-lg" type="submit">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> <br> <br>
            {{-- END FILTER --}}

            {{-- SEARCH PRICE --}}
            <form action="{{ url('/srCategoryProductPrice/'.$tle->id) }}">
                <div class="row" style="padding: 0 20% 0 20%">
                    <div class="col-md-6 text-center animate-box">
                        FROM
                        <input name="price1" class="form-control" type="number" min="1" placeholder="Enter a price">
                    </div>
                    <div class="col-md-6 text-center animate-box">
                        TO
                        <input name="price2" class="form-control" type="number" max="10000" placeholder="Enter a price">
                    </div>
                </div> <br>
                <div class="row">
                    <div class="col-md-12 text-center animate-box">
                        <Button class="btn-primary btn-outline btn-lg" style="submit">Search</Button>
                    </div>
                </div>
            </form>
            <br> <br>
            {{-- END SEARCH PRICE --}}

            {{-- Product --}}
            <div class="row">

                @foreach ($products as $p)
                    <div class="col-md-4 text-center animate-box">
                        <div class="product">
                            <div class="product-grid"
                                style="background-image:url({{ asset('asset/admin/images/product/' . $p->image_1) }});">
                                <div class="inner">
                                    <p>
                                        <a href="{{ url('/add-to-cart/'.$p->id) }}" class="icon"><i class="icon-shopping-cart"></i></a>
                                        <a href="{{ url('productDetail/' . $p->id) }}" class="icon"><i class="icon-eye"></i></a>
                                    </p>
                                </div>
                            </div>
                            <div class="desc">
                                <h3><a href="{{ url('productDetail/' . $p->id) }}">{{ $p->name }}</a></h3>
                                <span class="price">${{ $p->price }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{-- End product --}}

            </div>
            <div class="animate-box" style="text-align: right;">{{ $products->links('vendor.pagination.bootstrap-4') }}</div>
        </div>

    </div>

    <style>
        .input-price {
            width: 80%;
        }
    </style>

@endsection
@section('script-section')

@endsection
