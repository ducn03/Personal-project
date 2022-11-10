<div class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="float-left">
                    <div class="hamburger sidebar-toggle">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="float-right">

                    <div class="dropdown dib">
                        <div class="header-icon" data-toggle="dropdown">
                            <span class="user-avatar">{{ session('admin')->fullname }}
                                <i class="ti-angle-down f-s-10"></i>
                            </span>
                            <div class="drop-down dropdown-profile dropdown-menu dropdown-menu-right">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <button onclick="location.href=` `" class="subnavbtn"><i class="ti-user"></i> Profile
                                            </button>
                                        </li>

                                        <li>
                                            <button onclick="location.href=`{{ url('logoutAdmin') }}`" class="subnavbtn"><i class="ti-power-off"></i> Log out
                                            </button>
                                        </li>
                                    </ul>
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
    .subnavbtn{
        width: 100%;
        background: none;
        border: none;
        color: #333;
    }
</style>
