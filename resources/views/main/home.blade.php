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

        <!-- Banner Area -->
        <div class="banner-slider-area">
            <div class="banner-slider owl-carousel owl-theme">
                @foreach ($slides as $slide)
                <div class="banner-item item-bg1111" style="background-image: url('{{ asset('images/'.$slide->image) }}')">
                    <div class="d-table">
                        <div class="d-table-cell">
                            <div class="container">
                                <div class="banner-item-content">
                                    <span>{{ $slide->brand->name }}</span>
                                    <h1>{{ $slide->title }}</h1>
                                    <p>
                                        {{ $slide->description }}
                                    </p>
                                    <div class="banner-btn">
                                        <a href="about.html" class="default-btn btn-bg-two border-radius-50">تسوق الان<i class='bx bx-chevron-right'></i></a>
                                        <a href="contact.html" class="default-btn btn-bg-one border-radius-50 ml-20">Get A Quote <i class='bx bx-chevron-right'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
        <!-- Banner Area End -->

        <!-- Talk Area -->
        <div class="talk-area ptb-100 mt-5" style="{{ $externalCategories[0]->image ? 'background-image: url('.asset('images/'.$externalCategories[0]->image).')' : '' }};display: none;">
            <div class="container">
                <div class="talk-content text-center">
                    <div class="section-title text-center">
                        @if ( $externalCategories[0]->discount != null && $externalCategories[0]->discount != 0)
                            <span class="sp-color1">خصم بنسبة {{ $externalCategories[0]->discount }} %</span>
                        @endif
                        <h2>{{ $externalCategories[0]->name }}</h2>
                    </div>
                    <a href="contact.html" class="default-btn btn-bg-two border-radius-5">Contact Us</a>
                </div>
            </div>
        </div>
        <!-- Talk Area End -->

        <section class="services-area-three pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    @if ( $externalCategories[0]->discount != null && $externalCategories[0]->discount != 0)
                    <span class="sp-color2">خصم بنسبة {{ $externalCategories[0]->discount }} %</span>
                @endif
                    <h2>{{ $externalCategories[0]->name }}</h2>
                </div>
                <div class="row pt-45">

                    @foreach ( $externalCategories[0]->externalCategoryItems as $exterItem)
                    <div class="col-lg-4 col-md-6">
                        <div class="services-item">
                            <a href="service-details.html">
                                <img src="{{ asset('images'.'/'.$exterItem->item->image ) }}" alt="Images">
                            </a>
                            <div class="content">
                                <i class="flaticon-consultant"></i>
                                <span><a href="service-details.html">{{ $exterItem->item->category_name }}</a></span>
                                <h3><a href="service-details.html">{{ $exterItem->item->name }}</a></h3>
                            </div>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
        </section>

        <!-- Services Area -->

        <!-- Case Study Area -->
        <div class="case-study-area pt-100 pb-70">
            <div class="container-fluid p-0">
                <div class="section-title text-center">
                    <h2>وصلنا حديثاً</h2>
                </div>

                <div class="case-study-slider owl-carousel owl-theme pt-45">
                    @foreach ($newitems as $index=> $item)
                    <div class="case-study-item">
                        <a href="{{ route('shopcart') }}">
                            <img src="{{ asset('images/'.$item->image) }}" alt="Images">
                        </a>
                        <div class="content">
                            <h3><a href="{{ route('shopcart') }}">{{ $item->name }}</a></h3>
                            <ul>


                                @if ($item->discount != null && $item->discount != 0)
                                <li><a href="{{ route('shopcart') }}">

                                    <del>{{ $item->exchange_price }}</del>
                                </a></li>
                                @endif



                                <li><a href="{{ route('shopcart') }}"></a>{{ $item->discounted_price }} </li>

                            </ul>
                            <a href="/addItemToCart/{{ $item->id }}" class="more-btn">

                                <i class='bx bx-right-arrow-alt'></i>
                            </a>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>
        <!-- Case Study Area End -->

        <!-- Technology Area -->
        <section class="technology-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color1">Technology Index</span>
                    <h2>We Deliver Our Best Solution With The Goal of Trusting</h2>
                </div>

                <div class="row pt-45">
                    <div class="col-lg-2 col-6">
                        <div class="technology-card">
                            <i class="flaticon-android"></i>
                            <h3>Android</h3>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6">
                        <div class="technology-card">
                            <i class="flaticon-website"></i>
                            <h3>Web</h3>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6">
                        <div class="technology-card">
                            <i class="flaticon-apple"></i>
                            <h3>ios</h3>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6">
                        <div class="technology-card">
                            <i class="flaticon-television"></i>
                            <h3>TV</h3>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6">
                        <div class="technology-card">
                            <i class="flaticon-smartwatch"></i>
                            <h3>Watch </h3>
                        </div>
                    </div>

                    <div class="col-lg-2 col-6">
                        <div class="technology-card">
                            <i class="flaticon-cyber-security"></i>
                            <h3>IoT</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Technology Area End -->

        <!-- Brand Area -->
        <div class="brand-area ptb-100">
            <div class="container">
                <div class="brand-slider owl-carousel owl-theme">
                    @foreach($brands as $brand)
                    <a href="{{ route('itemsByBrand',$brand->id) }}" class="brand-item">
                        <img src="{{ asset('images/'. $brand->image) }}" class="brand-logo-one" alt="Images">
                        <img src="{{ asset('images/'. $brand->image) }}" class="brand-logo-two" alt="Images">
                    </a>
                    @endforeach


                </div>
            </div>
        </div>
        <!-- Brand Area End -->

        <!-- Clients Area -->
        <section class="clients-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color2">Our Clients</span>
                    <h2>Our Clients Feedback</h2>
                </div>

                <div class="clients-slider owl-carousel owl-theme pt-45">
                    <div class="clients-content">
                        <div class="content">
                            <img src="{{ asset('mainasset/images/clients-img/clients-img1.jpg') }}" alt="Images">
                            <i class='bx bxs-quote-alt-left'></i>
                            <h3>Jonthon Martin</h3>
                            <span>App Developer</span>
                        </div>
                        <p>
                            “Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis.
                            sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi loren accumsan ipsum velit.”
                        </p>
                    </div>

                    <div class="clients-content">
                        <div class="content">
                            <img src="{{ asset('mainasset/images/clients-img/clients-img2.jpg') }}" alt="Images">
                            <i class='bx bxs-quote-alt-left'></i>
                            <h3>Alin Decros</h3>
                            <span>Graphic Designer</span>
                        </div>
                        <p>
                            “Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis.
                            sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi loren accumsan ipsum velit.”
                        </p>
                    </div>

                    <div class="clients-content">
                        <div class="content">
                            <img src="{{ asset('mainasset/images/clients-img/clients-img3.jpg') }}" alt="Images">
                            <i class='bx bxs-quote-alt-left'></i>
                            <h3>Elen Musk</h3>
                            <span>Web Developer</span>
                        </div>
                        <p>
                            “Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis.
                            sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi loren accumsan ipsum velit.”
                        </p>
                    </div>
                </div>
            </div>

            <div class="client-circle">
                <div class="client-circle-1">
                    <div class="circle"></div>
                </div>
                <div class="client-circle-2">
                    <div class="circle"></div>
                </div>
                <div class="client-circle-3">
                    <div class="circle"></div>
                </div>
                <div class="client-circle-4">
                    <div class="circle"></div>
                </div>
                <div class="client-circle-5">
                    <div class="circle"></div>
                </div>
                <div class="client-circle-6">
                    <div class="circle"></div>
                </div>
                <div class="client-circle-7">
                    <div class="circle"></div>
                </div>
            </div>
        </section>
        <!-- Clients Area End -->

        <!-- Blog Area -->
        <div class="blog-area pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color2">Latest Blog</span>
                    <h2>Let’s Check Some Latest Blog</h2>
                </div>

                <div class="row pt-45">
                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img src="{{ asset('mainasset/images/blog/blog-img1.jpg') }}" alt="Blog Images">
                                </a>
                                <div class="blog-tag">
                                    <h3>11</h3>
                                    <span>Dec</span>
                                </div>
                            </div>
                            <div class="content">
                                <ul>
                                    <li>
                                        <a href="blog-1.html"><i class='bx bxs-user'></i> By Admin</a>
                                    </li>
                                    <li>
                                        <a href="blog-1.html"><i class='bx bx-purchase-tag-alt'></i>Business</a>
                                    </li>
                                </ul>

                                <h3>
                                    <a href="blog-details.html">Product Idea Solution for New Generation</a>
                                </h3>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
                                <a href="blog-details.html" class="read-btn">Read More <i class='bx bx-chevron-right'></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img src="{{ asset('mainasset/images/blog/blog-img2.jpg') }}" alt="Blog Images">
                                </a>
                                <div class="blog-tag">
                                    <h3>14</h3>
                                    <span>Dec</span>
                                </div>
                            </div>
                            <div class="content">
                                <ul>
                                    <li>
                                        <a href="blog-1.html"><i class='bx bxs-user'></i> By Admin</a>
                                    </li>
                                    <li>
                                        <a href="blog-1.html"><i class='bx bx-purchase-tag-alt'></i>Invention</a>
                                    </li>
                                </ul>
                                <h3>
                                    <a href="blog-details.html">New Device Invention for Digital Platform</a>
                                </h3>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
                                <a href="blog-details.html" class="read-btn">Read More <i class='bx bx-chevron-right'></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3">
                        <div class="blog-card">
                            <div class="blog-img">
                                <a href="blog-details.html">
                                    <img src="{{ asset('mainasset/images/blog/blog-img3.jpg') }}" alt="Blog Images">
                                </a>
                                <div class="blog-tag">
                                    <h3>17</h3>
                                    <span>Dec</span>
                                </div>
                            </div>
                            <div class="content">
                                <ul>
                                    <li>
                                        <a href="blog-1.html"><i class='bx bxs-user'></i> By Admin</a>
                                    </li>
                                    <li>
                                        <a href="blog-1.html"><i class='bx bx-purchase-tag-alt'></i>Achive</a>
                                    </li>
                                </ul>

                                <h3>
                                    <a href="blog-details.html">Business Strategy Make His Goal Acheive </a>
                                </h3>
                                <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum.</p>
                                <a href="blog-details.html" class="read-btn">Read More <i class='bx bx-chevron-right'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End -->

        <!-- Footer Area End -->
       @include('main.layout.footer')
        <!-- Footer Area End -->

@include('main.layout.scriptjs')

    </body>
</html>
