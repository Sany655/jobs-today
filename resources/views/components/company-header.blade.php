<div class="header">
    <div class="logo logo-dark">
        <a href="index.html">
            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo">
            <img class="logo-fold" src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo">
        </a>
    </div>
    <div class="logo logo-white">
        <a href="index.html">
            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo">
            <img class="logo-fold" src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo">
        </a>
    </div>
    <div class="nav-wrap">
        <ul class="nav-left">
            <li class="desktop-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
            <li class="mobile-toggle">
                <a href="javascript:void(0);">
                    <i class="anticon"></i>
                </a>
            </li>
        </ul>
        <ul class="nav-right">
            <li class="dropdown dropdown-animated scale-left">
                <div class="pointer" data-toggle="dropdown">
                    @if (session('company')->image)
                        <div class="avatar avatar-image  m-h-10 m-r-15">
                            <img src="{{ asset('storage/app/' . session('company')->image) }}" alt="">
                        </div>
                    @else
                        <div class="avatar avatar-icon m-h-10 m-r-15">
                            <i class="anticon anticon-user"></i>
                        </div>
                    @endif
                </div>
                <div class="p-b-15 p-t-20 dropdown-menu pop-profile">
                    <div class="p-h-20 p-b-15 m-b-10 border-bottom">
                        <div class="d-flex m-r-50">
                            @if (session('company')->image)
                                <div class="avatar avatar-image  m-h-10 m-r-15">
                                    <img src="{{ asset('storage/app/' . session('company')->image) }}" alt="">
                                </div>
                            @else
                                <div class="avatar avatar-icon m-h-10 m-r-15">
                                    <i class="anticon anticon-user"></i>
                                </div>
                            @endif
                            <div class="m-l-10">
                                <p class="m-b-0 text-dark font-weight-semibold">{{ session('company')->name }}</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{ url('company/' . session('company')['id'] . '/edit') }}"
                        class="dropdown-item d-block p-h-15 p-v-10">
                        <div class="d-flex align-items-center justify-content-between">
                            <div>
                                <i class="anticon opacity-04 font-size-16 anticon-user"></i>
                                <span class="m-l-10">Edit Profile</span>
                            </div>
                            <i class="anticon font-size-10 anticon-right"></i>
                        </div>
                    </a>
                    <form action="{{ url('/logout') }}" method="post" name="logout">
                        @csrf
                        <a href="javascript:void(0);" class="dropdown-item d-block p-h-15 p-v-10"
                            onclick="document.logout.submit();">
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="anticon opacity-04 font-size-16 anticon-logout"></i>
                                    <span class="m-l-10">Logout</span>
                                </div>
                                <i class="anticon font-size-10 anticon-right"></i>
                            </div>
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
