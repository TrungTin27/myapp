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

                <!-- HOME -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('dashboard.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('Dashboard*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-comments aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">DASHBOARD</span>
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



                <!-- Trending now/latest posts/posts -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('posts.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('Posts.*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-list-ol aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">TRENDING NOW/LATEST POSTS/POSTS</span>
                    </a>
                </li>

                <!-- Chicken_recipes -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('chicken_recipes.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('Chicken_recipes*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-comments aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">CHICKEN RECIPES</span>
                    </a>
                </li>

                <!-- Contact messages -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('contact_messages.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('contact_messages*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-comments aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">Contact Messages</span>
                    </a>
                </li>

                <!-- Pasta_recipes -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('pasta_recipes.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('Pasta_recipes*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-comments aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">PASTA RECIPES</span>
                    </a>
                </li>

                <!-- Reader_favorites -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('reader_favorites.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('Reader_favorites*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-comments aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">READER'S FAVORITES</span>
                    </a>
                </li>

                <!-- Author_sections -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('author_sections.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('Author_sections*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-comments aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">AUTHOR</span>
                    </a>
                </li>


                <!-- How_tos -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('how_tos.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('How_tos*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-comments aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">LEARN HOW TO</span>
                    </a>
                </li>

                <!-- Breakfast_recipes -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('breakfast_recipes.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('Breakfast_recipes*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-comments aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">BREAKFAST RECIPES</span>
                    </a>
                </li>

                <!-- Under_recipes -->
                <li class="aiz-side-nav-item mb-1">
                    <a href="{{ route('under_recipes.index') }}"
                        class="aiz-side-nav-link d-flex align-items-center gap-2 px-3 py-2 rounded
                       {{ request()->is('Under_recipes*') ? 'bg-white fw-semibold text-dark' : 'text-secondary' }}">
                        <i class="las la-comments aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">UNDER 10$</span>
                    </a>
                </li>



            </ul>
        </div>
    </div>

    <div class="aiz-sidebar-overlay"></div>
</div>