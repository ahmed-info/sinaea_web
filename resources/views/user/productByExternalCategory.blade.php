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


    <section class="services-area-two pt-100 pb-70">
        <div class="container">
            <div class="section-title text-center">
                <span class="sp-color1">Our Services</span>
                <h2>{{ $singleExternal->name }}</h2>
            </div>

        </div>
    </section>

    <div class="row justify-content-center align-items-center pt-45">
        @if($singleExternal->externalCategoryItems)
        @forelse ($singleExternal->externalCategoryItems as $externalItem)
            <div class="col-lg-3 col-md-6 text-right">
                <div class="services-card services-card-color-bg2">
                    <a href="{{ route('productDetails', $externalItem->item->id) }}">
                        <img src="{{ asset('images/' . $externalItem->item->image) }}" style="height:200px;object-fit: cover" alt="services">
                    </a>
                    <h3><a href="{{ route('productDetails', $externalItem->item->id) }}">{{ $externalItem->item->name }}</a></h3>

                    @if ($externalItem->item->itemDetails)
                        @if ($externalItem->item->itemDetails != null)
                        @foreach ($externalItem->item->itemDetails as $detail)

                        <p>{!! $detail->description !!}</p>
                        @endforeach

                        @endif
                    @endif
                    <ul style="list-style: none;justify-content: space-between;">


                        @if ($externalItem->discount != null && $externalItem->item->discount != 0)
                            <li><a href="#" class="sp-color1">

                                    <span
                                        class="text-dark mx-2 sp-color1" style="color: yellow">السعر</span><del>{{ number_format( $externalItem->item->exchange_price) }}
                                        د.ع</del>
                                </a></li>
                        @endif



                        <li><a href="#" class="sp-color1" style="font-weight: bold"></a><span
                                class="text-dark mx-2 sp-color1" style="color: yellow">السعر</span>{{ number_format( $externalItem->item->discounted_price) }} د.ع
                        </li>

                    </ul>
                    <a href="{{ route('addItemToCart', $externalItem->item->id) }}" class="learn-btn">اضافة الى السلة<i
                            class='bx bx-chevron-right'></i></a>
                </div>
            </div>
        @empty
            <div class="col-lg-12">
                <div class="alert alert-danger text-center">
                    لا يوجد منتجات
                </div>
        @endforelse
        @endif



    </div>



    <!-- Brand Area -->
    <div class="brand-area ptb-100">
        <div class="container">
            <div class="section-title mb-5 text-center">
                <h2>العلامات التجارية الأخرى</h2>
            </div>
            <div class="brand-slider owl-carousel owl-theme">
                @foreach ($brands as $otherBrand)
                    <a href="{{ route('itemsByBrand', $otherBrand->id) }}" class="brand-item">
                        <img src="{{ asset('images/' . $otherBrand->image) }}" class="brand-logo-one" alt="Images" style="width: 100%;height:200px;object-fit: cover;">
                        <img src="{{ asset('images/' . $otherBrand->image) }}" class="brand-logo-two" alt="Images" style="width: 100%;height:200px;object-fit: cover;">
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
