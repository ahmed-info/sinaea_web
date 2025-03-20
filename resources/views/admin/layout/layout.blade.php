<!doctype html>
<html lang="ar" dir="rtl">

@include('admin.layout.head')

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        @include('admin.layout.sidebar')
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand justify-content-between navbar-light topbar-nav">

                    <h4>
لوحة التحكم الصناعية

                    </h4>

                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('assets/images/logo03.jpg') }}" class="user-img"
                                alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">{{ auth()->user()->name }}</p>
                                <p class="designattion mb-0">عدد صناعية</p>
                            </div>
                        </a>

                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
        <!--start page wrapper -->
        @yield('content')
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2025. جميع الحقوق محفوظة لعدد صناعية</p>
        </footer>
    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplebar/5.3.6/simplebar.min.js"></script>
    <script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--app JS-->

    <script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('assets/js/app.js') }}"></script>


    @if (session('status') || session('success'))
        <script>
            toastr.success("{{ session('status') }}");
        </script>

        @php
            // Remove a specific session key
            session()->forget(['status','success']);
        @endphp
    @endif


    @if (session('error'))
        <script>
            toastr.error("{{ Session::get('error') }}");
        </script>
    @endif

    <script>
        $('.show_confirm').click(function(event) {
            //	alert('hi');
            var form = $(this).closest("form");
            event.preventDefault();
            //alert('hi2222');
            Swal.fire({
                title: `هل انت متأكد من الحذف`,
                text: "لا يمكنك الاسترجاع بعد عملية الحذف",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
           $("#summernote").summernote();
           // $('.dropdown-toggle').dropdown();
        });
    </script>


</body>

</html>
