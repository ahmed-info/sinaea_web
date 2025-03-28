<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap RTL CSS -->
    <link rel="stylesheet" href="{{ asset('mainasset/css/bootstrap.rtl.min.css') }}">
    <!-- Animate Min CSS -->
    <link rel="stylesheet" href="{{ asset('mainasset/css/animate.min.css') }}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('mainasset/fonts/flaticon.css') }}">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{ asset('mainasset/css/boxicons.min.css') }}">
    <!-- Owl Carousel Min CSS -->
    <link rel="stylesheet" href="{{ asset('mainasset/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('mainasset/css/owl.theme.default.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('mainasset/css/magnific-popup.css') }}">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('mainasset/css/nice-select.min.css') }}">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('mainasset/css/meanmenu.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('mainasset/css/style.css') }}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('mainasset/css/responsive.css') }}">
    <!-- Theme Dark CSS -->
    <link rel="stylesheet" href="{{ asset('mainasset/css/theme-dark.css') }}">
    <!-- RTL CSS -->
    <link rel="stylesheet" href="{{ asset('mainasset/css/rtl.css') }}">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('mainasset/images/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->

    <link href="{{ asset('assetcart/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetcart/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assetcart/css/style.css')}}" rel="stylesheet">

    <title>عدد صناعية</title>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
</head>
<style>
    *:focus {
  outline: none;
}
hr {
  border: none;
  border-top: 1px solid #000;
}
a:focus, button:focus {
  outline: none;
  border: none;
  box-shadow: none;
}
</style>
