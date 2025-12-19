<div class="aiz-topbar px-15px px-lg-25px d-flex align-items-stretch justify-content-between">
    <div class="d-xl-none d-flex">
        <div class="aiz-topbar-nav-toggler d-flex align-items-center justify-content-start mr-2 mr-md-3"
            data-toggle="aiz-mobile-nav">
            <button class="aiz-mobile-toggler">
                <span></span>
            </button>
        </div>
        <div class="aiz-topbar-logo-wrap d-flex align-items-center justify-content-start">
            <a href="#" class="d-block">
                <img src="">
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-stretch flex-grow-xl-1">
        <div class="d-none d-md-flex justify-content-around align-items-center align-items-stretch">
            <div class="d-none d-md-flex justify-content-around align-items-center align-items-stretch">
                <div class="aiz-topbar-item">
                    <div class="d-flex align-items-center">
                        <a class="btn btn-icon btn-circle btn-light" href="" target="_blank"
                            title="">
                            <i class="las la-globe"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around align-items-center align-items-stretch">
            <div class="d-flex align-items-center">
                <a class="btn btn-icon btn-circle btn-light mr-md-2" href="#">
                    <i class="fas fa-comments"></i>
                    {{-- @if(!empty($unreadCount) && $unreadCount > 0)
                        <span class="badge-bg-danger-1">{{ $unreadCount }}</span>
                    @endif --}}

                </a>
            </div>
            <div class="d-flex align-items-center">
                <li class="nav-item dropdown align-items-stretch">
                    <a class="btn btn-icon btn-circle btn-light" href="javascript:void(0);" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        {{-- @if(auth()->user()->unreadNotifications->count())
                            <span class="badge-bg-danger">{{ auth()->user()->unreadNotifications->count() }}</span>
                        @endif --}}
                    </a>
                    {{-- <ul class="dropdown-menu dropdown-menu-end" style="max-height:300px; overflow-y: scroll; border: 1px solid #ccc;">
                        @forelse(auth()->user()->notifications as $notification)
                            <li>
                                <a href="{{ route('admin.notifications.read', $notification->id) }}"
                    class="dropdown-item d-flex align-items-start {{ is_null($notification->read_at) ? 'fw-bold' : '' }}">
                    @if(is_null($notification->read_at))
                    <span class="text-primary me-2 mr-md-2">●</span>
                    @endif
                    <div>
                        {{ $notification->data['message'] }}<br>
                        <small
                            class="text-muted">{{ \Illuminate\Support\Str::limit($notification->data['comment'], 50) }}</small>
                    </div>
                    </a>
                </li>

                <li>
                    <hr class="dropdown-divider">
                </li>
                @empty
                <li><span class="dropdown-item">Không có thông báo mới</span></li>
                @endforelse
                </ul> --}}
                </li>
            </div>
            <div class="aiz-topbar-item ml-2">
                <div class="align-items-stretch d-flex dropdown">
                    <a class="dropdown-toggle no-arrow text-dark" data-toggle="dropdown" href="javascript:void(0);"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        {{-- <span class="d-flex align-items-center">
                            <span class="avatar avatar-sm mr-md-2">
                                <img src="{{getImage(optional(Auth::user())->avatar)}}">
                        </span>
                        <span class="d-none d-md-block">
                            <span class="d-block fw-500">{{optional(Auth::user())->name}}</span>
                        </span>
                        </span> --}}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-md">
                        <a href="#" class="dropdown-item">
                            <i class="las la-user-circle"></i>
                            <span>{{trans('Hồ sơ cá nhân')}}</span>
                        </a>

                        <!-- Thẻ dropdown logout -->
                        <a href="#" class="dropdown-item" onclick="logout();">
                            <i class="las la-sign-out-alt"></i>
                            <span>@lang('Đăng xuất')</span>
                        </a>

                        <!-- Form ẩn để submit logout -->
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <!-- Thêm đoạn JS submit logout -->


                    </div>
                </div>
            </div><!-- .aiz-topbar-item -->
        </div>
    </div>
</div><!-- .aiz-topbar -->
<script>
    function logout() {
        event.preventDefault();
        document.getElementById('logout-form').submit();
    }
</script>