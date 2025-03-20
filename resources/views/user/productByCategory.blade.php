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


        <section class="services-area-two pt-100 pb-70">
            <div class="container">
                <div class="section-title text-center">
                    <span class="sp-color1">Our Services</span>
                    <h2>منتجات {{ $singleCategory->name }}</h2>
                </div>
                <div class="row justify-content-center align-items-center pt-45">
                    @forelse ($items as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="services-card services-card-color-bg2">
                            <a href="service-details.html">
                                <img src="{{ asset('images/'.$item->image)}}" alt="services">
                            </a>
                            <h3><a href="service-details.html">{{ $item->name }}</a></h3>

                            @if ($item->item_details->count() > 0)

                            <p>{!! $item->item_details[0]->description !!}</p>
                            @endif
                            <ul style="list-style: none;justify-content: space-between;">


                                @if ($item->discount != null && $item->discount != 0)
                                <li><a href="case-details.html">

                                    <span class="text-dark mx-2 sp-color1">السعر</span><del>{{ $item->exchange_price }} د.ع</del>
                                </a></li>
                                @endif



                                <li><a href="case-details.html" class="sp-color1" style="font-weight: bold"></a><span class="text-dark mx-2 sp-color1">السعر</span>{{ $item->discounted_price }} د.ع</li>

                            </ul>
                            <a href="service-details.html" class="learn-btn">اشتري الان<i class='bx bx-chevron-right'></i></a>
                        </div>
                    </div>
                    @empty

                    @endforelse



                </div>
            </div>
        </section>



        <!-- Brand Area -->
        <div class="brand-area ptb-100">
            <div class="container">
                <div class="section-title mb-5">
                    <h2>العلامات التجارية</h2>
                </div>
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

        <!-- Footer Area End -->
       @include('main.layout.footer')
        <!-- Footer Area End -->

@include('main.layout.scriptjs')

    </body>
</html>
