<!doctype html>
<html lang="ar" dir="rtl">
    @include('main.layout.head')
    <body>
        <!-- Pre Loader -->
        <div class="preloader">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="spinner"></div>
                </div>
            </div>
        </div>
        <!-- End Pre Loader -->

        <!-- Top Header Start -->
        @include('main.layout.header')
        <!-- Top Header End -->

        <!-- Start Navbar Area -->
        @include('main.layout.navbar')
        <!-- End Navbar Area -->

        <!-- Search Overlay -->
        <div class="search-overlay">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="search-layer"></div>
                    <div class="search-layer"></div>
                    <div class="search-layer"></div>

                    <div class="search-close">
                        <span class="search-close-line"></span>
                        <span class="search-close-line"></span>
                    </div>

                    <div class="search-form">
                        <form action="{{ route('search.user') }}" method="Get">
                            @csrf
                            <input type="text" class="input-search" name="search" placeholder="ابحث هنا...">
                            <button type="submit"><i class='bx bx-search'></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Search Overlay -->
        <!-- Contact Form Area -->
        <div class="contact-form-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <h2>تسجيل الدخول</h2>
                </div>

                <div class="row pt-45 text-right">
                    <div class="col-lg-4">
                        <div class="contact-info mr-20">
                            <span>معلومات الاتصال</span>
                            <h2>اتصل بنا الان</h2>
                            <ul>
                                <li>
                                    <div class="content">
                                        <i class='bx bx-phone-call'></i>
                                        <h3>رقم الموبايل</h3>
                                        <a href="tel:{{$callUs->phone_with_country_code}}">{{ $callUs->phone }}</a>
                                    </div>
                                </li>

                                <li>
                                    <div class="content">
                                        <i class='bx bxs-map'></i>
                                        <h3>العنوان</h3>
                                        <span>{{ $callUs->address }}</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="content">
                                        <i class='bx bx-message'></i>
                                        <h3>اوقات الدوام</h3>
                                        <span>من {{ \Carbon\Carbon::parse($callUs->open_time)->format('h:i A') }}
                                        </span>

                                        <span>الى {{ \Carbon\Carbon::parse($callUs->close_time)->format('h:i A') }}</span>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="contact-form">
                            <form id="" method="post" action="{{ route('userregister') }}">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>اسم المستخدم<span>*</span></label>
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please Enter Your Name" value="{{ old('name') }}" placeholder="اسم المستخدم">
                                            <div class="help-block with-errors"></div>
                                            @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>رقم الموبايل <span>*</span></label>
                                            <input type="text" name="phone" id="phone_number" required data-error="ادخل رقم الموبايل" class="form-control" value="{{ old('phone') }}" placeholder="مثال: 07XXXXXXXXX">
                                            <div class="help-block with-errors"></div>
                                            @error('phone')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>كلمة المرور<span>*</span></label>
                                            <input type="password" name="password" id="phone_number" required data-error="ادخل كلمة المرور" class="form-control" placeholder="كلمة المرور">
                                            <div class="help-block with-errors"></div>
                                            @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>





                                    <div class="col-lg-12 col-md-12">
                                        <div class="agree-label">
                                            <label for="chb1">
                                                هل لديك حساب ؟<a href="{{ route('userlogin') }}">دخول</a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button type="submit" class="default-btn btn-bg-two border-radius-50">
                                            تسجيل الدخول <i class='bx bx-chevron-right'></i>
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Form Area End -->


        <!-- Footer Area End -->
       @include('main.layout.footer')
        <!-- Footer Area End -->

@include('main.layout.scriptjs')

    </body>
</html>
