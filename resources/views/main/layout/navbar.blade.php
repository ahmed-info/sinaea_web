<div class="navbar-area">
    <!-- Menu For Desktop Device -->
    <div class="mobile-nav">
        <a href="/" class="logo">
            <img src="{{ asset('mainasset/images/logos/logo-1.png') }}" class="logo-one" alt="Logo">
            <img src="{{ asset('mainasset/images/logos/logo-2.png') }}" class="logo-two" alt="Logo">
        </a>
    </div>

    <!-- Menu For Mobile Device -->
    <div class="main-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light ">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('mainasset/images/logos/logo-1.png') }}" class="logo-one" alt="Logo">
                    <img src="{{ asset('mainasset/images/logos/logo-2.png') }}" class="logo-two" alt="Logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link active">
                                الرئيسية
                            </a>
                        </li>
                        @forelse ($departments as $department )
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                {{ $department->name }} <i class='bx bx-caret-down'></i>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($department->categories as $category)
                                <li class="nav-item">
                                    <a href="{{ route('itemsByCategory', $category->id) }}" class="nav-link active">
                                        {{ $category->name }}
                                    </a>
                                </li>
                                @endforeach


                            </ul>
                        </li>
                        @empty

                        @endforelse


                    </ul>

                    <div class="nav-side d-display">
                        <div class="nav-side-item">
                            <div class="search-box">
                                <i class='bx bx-search'></i>
                            </div>
                        </div>

                        @if (!auth()->check())
                        <div class="nav-side-item">
                            <div class="get-btn">
                                <a href="{{ route('userregister') }}" class="default-btn btn-bg-two border-radius-50">تسجيل الدخول / دخول<i class='bx bx-chevron-right'></i></a>
                            </div>
                        </div>
                        @else
                        <div class="nav-side-item">
                            <div class="get-btn">
                                <a href="{{ route('shopcart') }}" class="default-btn btn-bg-two border-radius-50">سلة المشتريات
                                    <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.29977 5H21L19 12H7.37671M20 16H8L6 3H3M9 20C9 20.5523 8.55228 21 8 21C7.44772 21 7 20.5523 7 20C7 19.4477 7.44772 19 8 19C8.55228 19 9 19.4477 9 20ZM20 20C20 20.5523 19.5523 21 19 21C18.4477 21 18 20.5523 18 20C18 19.4477 18.4477 19 19 19C19.5523 19 20 19.4477 20 20Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>


                            </div>
                        @endif

                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="side-nav-responsive">
        <div class="container-max">
            <div class="dot-menu">
                <div class="circle-inner">
                    <div class="in-circle circle-one"></div>
                    <div class="in-circle circle-two"></div>
                    <div class="in-circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="side-nav-inner">
                    <div class="side-nav justify-content-center align-items-center">
                        <div class="side-nav-item nav-side">
                            <div class="search-box">
                                <i class='bx bx-search'></i>
                            </div>
                            <div class="get-btn">
                                <a href="{{ route('userregister') }}" class="default-btn btn-bg-two border-radius-50">تسجيل دخول / دخول<i class='bx bx-chevron-right'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
