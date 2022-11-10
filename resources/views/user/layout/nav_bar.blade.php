<nav class="fh5co-nav" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-2">
                <div id="fh5co-logo"><a href="{{ url('home') }}">Shop.</a></div>
            </div>
            <div class="col-md-6 col-xs-6 text-center menu-1">
                <ul>
                    <li class="has-dropdown">
                        <a href="{{ url('allProduct') }}">Shop</a>
                        <ul class="dropdown">
                            <li><a href="{{ url('categoryProduct/1') }}">Cooking equipment</a></li>
                            <li><a href="{{ url('categoryProduct/2') }}">Dispensing equipment</a></li>
                            <li><a href="{{ url('categoryProduct/3') }}">Kitchen equipment</a></li>
                            <li><a href="{{ url('categoryProduct/4') }}">Household appliances</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('about') }}">About</a></li>
                    <li><a href="{{ url('contact') }}">Contact</a></li>
                    @if (session('user_2'))
                        <li><a href="{{ url('user_2/info/'.session('user_2')->id) }}"><i class="icon-user"></i> {{ session('user_2')->fullname }}</a></li>
                        <li>/</li>
                        <li><a href="{{ url('logoutUser') }}"><i class="icon-log-out"></i> Logout</a></li>
                    @else
                        <li><a href="{{ url('signUp') }}"><i class="icon-user"></i> Sign up</a></li>
                        <li>/</li>
                        <li><a href="{{ url('signIn') }}"><i class="icon-user"></i> Sign in</a></li>
                    @endif

                </ul>
            </div>
            <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
                <ul>
                    <li class="shopping-cart"><a href="{{ url('cart') }}" class="cart"><span><small>
                                    @if (session('cart'))
                                        {{ count(session('cart')) }}
                                    @else
                                        0
                                    @endif
                                </small><i class="icon-shopping-cart"></i></span></a></li>
                </ul>
            </div>
        </div>

    </div>
</nav>
