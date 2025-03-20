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
                        <form>
                            <input type="text" class="input-search" placeholder="Search here...">
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
                    <h2>دخول</h2>
                </div>

                <div class="row pt-45">
                    <div class="col-lg-4">
                        <div class="contact-info mr-20">
                            <span>Contact Info</span>
                            <h2>Let's Connect With Us</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam imperdiet varius mi, ut hendrerit magna mollis ac. </p>
                            <ul>
                                <li>
                                    <div class="content">
                                        <i class='bx bx-phone-call'></i>
                                        <h3>Phone Number</h3>
                                        <a href="tel:+1(212)-255-5511">+1 (212) 255-5511</a>
                                    </div>
                                </li>

                                <li>
                                    <div class="content">
                                        <i class='bx bxs-map'></i>
                                        <h3>Address</h3>
                                        <span>124 Virgil A Virginia, USA</span>
                                    </div>
                                </li>

                                <li>
                                    <div class="content">
                                        <i class='bx bx-message'></i>
                                        <h3>Contact Info</h3>
                                        <a href="mailto:hello@techex.com">hello@techex.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div class="contact-form">
                            <form id="" method="post" action="{{ route('userlogin') }}">
                                @csrf
                                @method('POST')
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>رقم الموبايل <span>*</span></label>
                                            <input type="text" name="phone" id="phone_number" value="{{ old('phone') }}" required data-error="ادخل رقم الموبايل" class="form-control" placeholder="مثال: 07XXXXXXXXX">
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
                                             ليس لديك حساب؟ <a href="{{ route('userregister') }}">سجل الان</a>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 text-center">
                                        <button type="submit" class="default-btn btn-bg-two border-radius-50">
                                            دخول <i class='bx bx-chevron-right'></i>
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
