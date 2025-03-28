<header class="top-header top-header-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-6">
                <div class="top-head-left">
                    <div class="top-contact">
                        <h3>اتصل الان : <a href="tel:{{ $callUs->phone_with_country_code }}">{{ $callUs->phone }}</a></h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-6">
                <div class="top-header-right">
                    <div class="top-header-social">
                        <ul>
                            @if($social->facebook != null)
                            <li>
                                <a href="{{ $social->facebook }}" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            @endif

                            <li>
                                <a href="https://twitter.com/?lang=en" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>

                            @if ($social->instagram != null)
                            <li>
                                <a href="{{ $social->instagram  }}" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                            @endif
                            @if(auth()->check())
                            <form method="post" action="{{ route('logout') }}">
                                @csrf
                                @method('POST')
                                <button type="submit" class="nav-link text-white">تسجيل الخروج</button>

                            </form>
                            @endif

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
