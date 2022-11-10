<div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures">
    <div class="nano">
        <div class="nano-content">
            <ul>
                <div class="logo"><a href="index.html">
                        <!-- <img src="images/logo.png" alt="" /> --><span>Shop</span>
                    </a></div>
                <li class="label">Main</li>

                {{-- DASHBOARD --}}
                <li><a href="{{ url('admin/dashboard') }}"><i class="ti-home"></i> Dashboard </a></li>

                <li class="label">Product</li>
                <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i> Product <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ url('admin/viewProduct') }}"><i class="ti-eye"></i>View Product</a></li>
                        <li><a href="{{ url('admin/createProduct') }}"><i class="ti-plus"></i>Create Product</a></li>
                    </ul>
                </li>
                <li><a class="sidebar-sub-toggle"><i class="ti-shopping-cart"></i> Order <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ url('admin/viewOrder') }}"><i class="ti-eye"></i>View order</a></li>
                    </ul>
                </li>
                {{-- STAFF --}}
                <li><a class="sidebar-sub-toggle"><i class="ti-user"></i> Staff <span
                            class="sidebar-collapse-icon ti-angle-down"></span></a>
                    <ul>
                        <li><a href="{{ url('admin/viewStaff') }}"><i class="ti-eye"></i>View staff</a></li>
                        <li><a href="{{ url('admin/createStaff') }}"><i class="ti-plus"></i>Create staff</a></li>
                    </ul>
                </li>
                {{-- CUSTOMER --}}
                <li><a href="{{ url('admin/viewCustomer') }}"><i class="ti-user"></i>Customer</a></li>
                {{-- FEEDBACK --}}
                <li><a href="{{ url('admin/viewFeedback') }}"><i class="ti-email"></i>Feedback</a></li>

            </ul>
        </div>
    </div>
</div>
