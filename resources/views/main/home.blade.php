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
                        <form action="{{ route('search.user') }}" method="POST">
                            @csrf
                            <input type="text" class="input-search" name="search" placeholder="ابحث هنا...">
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
                                        <a href="/#newItems" class="default-btn btn-bg-two border-radius-50">تسوق الان<i class='bx bx-chevron-right'></i></a>
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



    <!-- Carousel End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5" id="newItems">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1" style="border-radius: 10px; !important">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px; border-radius: 12px;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">منتجات عالية الجودة</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px; border-radius: 12px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">خدمة توصيل</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px; border-radius: 12px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">بيع جملة ومفرد</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->


    <!-- Categories Start -->
    <div class="container-fluid pt-5 text-right" dir="rtl">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="pr-3">الفئات</span></h2>
        <div class="row px-xl-5 pb-3">
            @foreach ($categories as $category)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a class="text-decoration-none2" href="/itemsByCategory/{{ $category->id }}">
                    <div class="cat-item d-flex align-items-center mb-4" style="border-radius: 10px; !important">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="{{ asset('images/'.$category->image) }}" style="height:100%;object-fit: cover;" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>{{ $category->name }}</h6>
                            <small class="text-body">{{ $category->category_count }} منتج</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

        </div>
    </div>
    <!-- Categories End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5 pb-3 text-right" dir="rtl" >
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="pr-3">منتجات جديدة</span></h2>
        <div class="row px-xl-5">
            @forelse ($newitems as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="product-item bg-light mb-4" style="border-radius: 12px;box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                    <div class="product-img position-relative overflow-hidden" style="border-radius: 12px;">
                        <img class="img-fluid" style="width: 100%;height: 200px;object-fit: cover" src="{{ asset('images/'.$item->image) }}" alt="">
                        <div class="product-action">
                            <a class="btn btn-outline-dark btn-square" href="{{ route('addItemToCart', $item->id) }}"><i class="fa fa-shopping-cart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="{{ route('addItemTofav', $item->id) }}"><i class="far fa-heart"></i></a>
                            <a class="btn btn-outline-dark btn-square" href="{{ route('productDetails', $item->id) }}"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="py-4">
                        <a class="h6 text-decoration-none text-start mr-2" href="{{ route('productDetails', $item->id) }}">{{ $item->name }}</a>
                        <div class="d-flex align-items-center justify-content-between mx-3 mt-2">
                            <h5>{{ number_format( $item->discounted_price) }} د.ع</h5>
                            <h6 class="text-muted ml-2">
                                @if ($item->discount != null && $item->discount != 0)
                                <del>{{ number_format( $item->exchange_price) }} د.ع</del>
                                @endif
                            </h6>
                        </div>

                    </div>
                </div>
            </div>
            @empty
            <h3>لا توجد منتجات </h3>
            @endforelse


        </div>
    </div>
    <!-- Products End -->


    <!-- Offer Start -->
    <div class="container-fluid pt-5 pb-3">
        <div class="row px-xl-5">
            @foreach ($externalCategories as $externalCategory)
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;border-radius: 12px;">
                    <img class="img-fluid" src="{{ asset('images/externalCategory/1741962788_external.jpg') }}" alt="{{ $externalCategory->name }}">
                    <div class="offer-text">
                        @if($externalCategory->discount != null && $externalCategory->discount != 0)
                        <h6 class="text-white text-uppercase">خصم {{ $externalCategory->discount }} %</h6>
                        @endif
                        <h3 class="text-white mb-3">{{ $externalCategory->name }}</h3>
                        <a href="{{ route('itemsByExternal', $externalCategory->id) }}" class="btn btn-primary">تسوق الان</a>
                    </div>
                </div>
            </div>
            @endforeach


        </div>
    </div>
    <!-- Offer End -->


    <div class="brand-area ptb-100">
        <div class="container">
            <div class="section-title mb-5 text-center">
                <h2>العلامات التجارية</h2>
            </div>
            <div class="brand-slider owl-carousel owl-theme">
                @foreach($brands as $brand)
                <a href="{{ route('itemsByBrand',$brand->id) }}" class="brand-item">
                    <img src="{{ asset('images/'. $brand->image) }}" class="brand-logo-one" style="width: 100%;height: 200px;object-fit: cover" alt="Images">
                    <img src="{{ asset('images/'. $brand->image) }}" class="brand-logo-two" style="width: 100%;height: 200px;object-fit: cover" alt="Images">
                </a>
                @endforeach


            </div>
        </div>
    </div>


        <!-- Footer Area End -->
       @include('main.layout.footer')
        <!-- Footer Area End -->

@include('main.layout.scriptjs')

    </body>
</html>
