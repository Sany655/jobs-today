<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Dashboard</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li @yield('home')>
                        <a href="{{ url('/admin') }}">Home</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-idcard"></i>
                    </span>
                    <span class="title">Titles</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li @yield('title.index')>
                        <a href="{{ route('title.index') }}">Title</a>
                    </li>
                    <li @yield('title.create')>
                        <a href="{{ route('title.create') }}">Create Title</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-hdd"></i>
                    </span>
                    <span class="title">Categories</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li @yield('category.index')>
                        <a href="{{ route('category.index') }}">Category</a>
                    </li>
                    <li @yield('category.create')>
                        <a href="{{ route('category.create') }}">Create Category</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-compass"></i>
                    </span>
                    <span class="title">Company</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li @yield('company.index')>
                        <a href="{{ route('company.index') }}">Companies</a>
                    </li>
                    {{-- <li @yield('company.create')>
                        <a href="{{ route('company.create') }}">Create Company</a>
                    </li> --}}
                </ul>
            </li>
        </ul>
    </div>
</div>