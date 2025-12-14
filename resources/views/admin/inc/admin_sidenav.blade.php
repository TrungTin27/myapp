<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="#" class="d-block text-left">
                <img class="mw-100" src="{{asset('storage/avatars/logo.png')}}" class="brand-icon" alt="">
            </a>
        </div>
        <div class="aiz-side-nav-wrap">

            <ul class="aiz-side-nav-list" id="search-menu">
            </ul>
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="#"
                        class="aiz-side-nav-link {{--{{ areActiveRoutes(['admin.home.statistics']) }}--}}">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Trang chủ</span>
                    </a>
                </li>

                <!-- quản lý sản phẩm -->
                <li class="aiz-side-nav-item">
                    <a href="{{ route('product.index') }}"
                        class="aiz-side-nav-link ">
                        <i class="las la-money-bill aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Quản lý sản phẩm </span>
                    </a>
                </li>
                <!-- Course -->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('courses.index') }}">
                        <i class="fa fa-book"></i>
                        <span>Courses</span>
                    </a>
                </li>
                <!--Category-->
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('category.index') }}">
                        <i class="fa fa-book"></i>
                        <span>Category</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('banners.index') }}">
                        <i class="fa fa-book"></i>
                        <span>Banner</span>
                    </a>
                </li>






            </ul><!-- .aiz-side-nav -->
        </div><!-- .aiz-side-nav-wrap -->
    </div><!-- .aiz-sidebar -->
    <div class="aiz-sidebar-overlay"></div>
</div><!-- .aiz-sidebar -->