<!doctype html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="none">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="icon" href="">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- google font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@1.8.3/dist/css/lightgallery.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- aiz core css -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/css/vendors.css' ) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aiz-core.css' ) }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom-style.css' ) }}">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
    @yield('css')
    @yield('header')
    <style>
        body {
            font-size: 15px;
        }

        li.nav-item.dropdown {
            list-style: none !important;
        }

        .dropdown-item.fw-bold {
            font-weight: 700 !important;
            color: black;
        }

        .star-rating {
            direction: rtl;
            /* để sao lớn nhất nằm bên trái */
            font-size: 2rem;
            unicode-bidi: bidi-override;
        }

        .star-rating input[type="radio"] {
            display: none;
            /* Ẩn hoàn toàn radio tròn */
        }

        .star-rating label {
            color: #ccc;
            cursor: pointer;
            transition: color 0.2s;
        }

        /* Khi radio được chọn => tô màu các label phía trước */
        .star-rating input[type="radio"]:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            color: #ffc107;
        }

        .invalid-feedback {
            font-size: 12px;
        }

        .load-wrapp {
            float: left;
            width: 100px;
            height: 100px;
            margin: 0 10px 10px 0;
            padding: 20px 20px 20px;
            border-radius: 5px;
            text-align: center;
            background-color: black;
            position: fixed;
            z-index: -1;
            top: 0;
            left: 0;
            width: 100vw;
            opacity: 0;

            height: 100vh;
        }

        .load-wrapp.active {
            opacity: 0.5;
            z-index: 99;


        }

        .line {
            display: inline-block;
            width: 15px;
            height: 15px;
            border-radius: 15px;
            background-color: #fff;
        }

        .load-wrapp .load-3 {
            transform: translate(-50%, -50%);
            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
        }

        .load-3 .line:nth-last-child(1) {
            animation: loadingC 0.6s 0.1s linear infinite;
        }

        .load-3 .line:nth-last-child(2) {
            animation: loadingC 0.6s 0.2s linear infinite;
        }

        .load-3 .line:nth-last-child(3) {
            animation: loadingC 0.6s 0.3s linear infinite;
        }

        .ck-content {
            height: 200px;
        }

        .ck p {
            margin: 0;
        }

        .toast {
            border-radius: 8px;
            background-color: #333;
            color: #fff;
            position: relative;
            padding: 15px 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .toast-success {
            background-color: #28a745;
        }

        .toast-error {
            background-color: #dc3545;
        }

        .toast-info {
            background-color: #17a2b8;
        }

        .toast-warning {
            background-color: #ffc107;
        }

        .toast-title {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .toast-message {
            line-height: 1.5;
        }

        .toast-close-button {
            position: absolute;
            top: 20px;
            right: 10px;
            background: none;
            border: none;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .toast-close-button:hover {
            color: #ddd;
        }

        .swal2-actions {
            gap: 20px
        }

        
    </style>
    @yield('style')


</head>

<body class="">

    @if (session()->has('flash_notification'))
        <div class="flash-message {{ session('flash_notification.class') }}">
            {{ session('flash_notification.message') }}
        </div>
    @endif

    <div class="load-wrapp" id="loadPage">
        <div class="load-3">

            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>

    <div class="aiz-main-wrapper">
        @include('admin.inc.admin_sidenav')
        <div class="aiz-content-wrapper">
            @include('admin.inc.admin_nav')
            <div class="aiz-main-content">
                <div class="px-15px px-lg-25px">
                    @yield('content')
                </div>
                <div class="bg-white text-center py-3 px-15px px-lg-25px mt-auto">
                    <p class="mb-0">&copy; TEST</p>
                </div>
            </div><!-- .aiz-main-content -->
        </div><!-- .aiz-content-wrapper -->
    </div><!-- .aiz-main-wrapper -->

    @yield('modal')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js"
        integrity="sha256-ErZ09KkZnzjpqcane4SCyyHsKAXMvID9/xwbl/Aq1pc=" crossorigin="anonymous"></script>
    {{--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('assets/js/vendors-admin.js?v=') }}"></script>
    <script src="{{ asset('assets/js/summernote-image-title.js') }}"></script>
    <script src="{{ asset('js/aiz-core-admin.js?v=' ) }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.3.2/js/lightgallery.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('script')

    

    <!-- A friendly reminder to run on a server, remove this during the integration. -->
    <script>
        window.onload = function() {
            if (window.location.protocol === 'file:') {
                alert('This sample requires an HTTP server. Please serve this file with a web server.');
            }
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        function useConfim(option) {
            return Swal.fire({
                confirmButtonText: "{{ __('Xác nhận') }}",
                cancelButtonText: "{{ __('Hủy bỏ') }}",
                showCancelButton: true,
                showCloseButton: true,
                focusConfirm: false,
                focusCancel: true,
                buttonsStyling: false,
                customClass: {
                    confirmButton: "btn btn-primary me-2",
                    cancelButton: "btn btn-secondary me-2"
                },
                ...option
            }).then((res) => {
                if (res.isConfirmed) {
                    return Promise.resolve(res);
                }
                return Promise.reject(res);
            });
        }
    </script>
</body>

</html>