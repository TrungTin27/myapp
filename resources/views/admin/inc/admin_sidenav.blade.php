<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">

        <!-- LOGO -->
        <div class="aiz-side-nav-logo-wrap">
            <a href="#" class="d-block text-left px-3 py-2">
                <img class="mw-100" src="{{ asset('storage/avatars/logo.png') }}" alt="Logo">
            </a>
        </div>

        <!-- USER INFO -->
        <div class="aiz-side-user px-3 py-3 border-bottom">
            <div class="d-flex align-items-center gap-2">
                <img src="{{ asset('storage/avatars/admin.png') }}"
                    class="rounded-circle"
                    width="42" height="42" alt="Avatar">

                <div class="flex-grow-1">
                    <div class="fw-semibold text-dark">
                        {{ Auth::user()->name ?? 'Admin' }}
                    </div>
                    <small class="text-muted">Administrator</small>
                </div>
            </div>

            <div class="mt-2">
                <a
                    class="d-block text-secondary py-1">
                    <i class="las la-key me-1"></i> Đổi mật khẩu
                </a>

                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="d-block text-danger py-1">
                    <i class="las la-sign-out-alt me-1"></i> Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>

        <!-- MENU -->
        <div class="aiz-side-nav-wrap">
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">

                <!-- Trang chủ -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="#"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded text-secondary">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Trang chủ</span>
                    </a>
                </li>

                <!-- Quản lý sản phẩm -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('product.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('product.*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-box aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Quản lý sản phẩm</span>
                    </a>
                </li>

                <!-- Courses -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('courses.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('courses*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-graduation-cap aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Courses</span>
                    </a>
                </li>

                <!-- Category -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('category.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('category*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-tags aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Category</span>
                    </a>
                </li>

                <!-- Banner -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('banners.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('banners*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-images aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Banner</span>
                    </a>
                </li>

                <!-- Đánh giá sản phẩm -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('product_reviews.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('product_reviews.*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-star aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Đánh giá sản phẩm</span>
                    </a>
                </li>

                <!-- Chi tiết sản phẩm -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('product_details.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('product_details.*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-star aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Chi tiết sản phẩm</span>
                    </a>
                </li>

                <!-- Thành phần công thức -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('ingredients.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('recipe_ingredients*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-carrot aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Thành phần công thức </span>
                    </a>
                </li>

                <!-- Phần công thức nấu ăn -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('recipe_sections.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('recipe_sections*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-layer-group aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Phần công thức nấu ăn </span>
                    </a>
                </li>

                <!-- Video công thức -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('recipe_videos.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('recipe_videos*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-video aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Video công thức</span>
                    </a>
                </li>

                <!-- Các bước công thức -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('recipe_steps.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('recipe_steps*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-list-ol aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Các bước công thức</span>
                    </a>
                </li>

                <!-- Tips messenger -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('contact_messages.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('messages*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-comments aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Tips messenger</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>

    <div class="aiz-sidebar-overlay"></div>
</div>