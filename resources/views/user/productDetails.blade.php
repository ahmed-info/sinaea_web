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

        <div class="container-fluid pb-5">
            <div class="row px-xl-5">
                <div class="col-lg-5 mb-30">
                    <div id="product-carousel" class="">
                        <div class="carousel-inner bg-light">
                            <div class="active">
                                <img class="img-fluid w-100" src="{{ asset('images/'.$item->image) }}" alt="">
                            </div>

                        </div>

                    </div>
                </div>

                <div class="col-lg-7 h-auto mb-30">
                    <div class="h-100 bg-light p-30 text-right">
                        <h3>{{ $item->name }}</h3>
                        {{-- <div class="d-flex mb-3">
                            <div class="text-primary mr-2">
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star"></small>
                                <small class="fas fa-star-half-alt"></small>
                                <small class="far fa-star"></small>
                            </div>
                            <small class="pt-1">(99 Reviews)</small>
                        </div> --}}
                        <h3 class="font-weight-semi-bold mb-4">
                            @if ($item->discount != null && $item->discount != 0)
                            <del>{{ number_format( $item->exchange_price ) }} د.ع</del>
                            @endif
                        </h3>
                        <h3 class="font-weight-semi-bold mb-4">
                            {{ number_format( $item->discounted_price) }}
                        </h3>
                        <p class="mb-4">
                            @if ($item->itemDetails->count() > 0)
                            {{ $item->itemDetails[0]->description }}

                            @endif
                        </p>

                        <div class="d-flex align-items-center mb-4 pt-2">

                            <a class="btn btn-primary px-3 mx-2" href="{{ route('addItemToCart', $item->id) }}"><i class="fa fa-shopping-cart mr-1"></i>اضافة الى السلة</a>
                        </div>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#makeReviewModal">
                            Launch demo modal
                          </button>

                    </div>
                </div>
            </div>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="bg-light p-30">
                        <div class="nav nav-tabs mb-4">
                            <a class="nav-item nav-link text-dark active" data-toggle="tab" href="#tab-pane-1">المحتوى</a>
                        </div>
                        <div class="tab-content text-right" >
                            <div class="tab-pane fade show active" id="tab-pane-1">
                                <h4 class="mb-3">تفاصيل المنتج</h4>
                                @if ($item->item_details->count() > 0)
                                @foreach ($item->item_details as $itemdetail)

                                <p>{!! $itemdetail->description !!}</p>
                                @endforeach
                                @endif
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Shop Detail End -->


        <!-- Products Start -->
        <div class="container-fluid py-5" dir="ltr">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4 text-right"><span class="pr-3">منتجات اخرى قد تعجبك</span></h2>
            <div class="row px-xl-5">
                <div class="col">
                    <div class="owl-carousel related-carousel">
                        @foreach ($relatedItems as $item)
                        <div class="product-item bg-light" style="border-radius: 12px;">
                            <div class="product-img position-relative overflow-hidden" style="border-radius: 12px;">
                                <img class="img-fluid w-100" src="{{ asset('images/'.$item->image) }}" alt="">
                                <div class="product-action">
                                    <a class="btn btn-outline-dark btn-square" href="{{ route('addItemToCart',$item->id) }}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                    <a class="btn btn-outline-dark btn-square" href="{{ route('productDetails', $item->id) }}"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="py-4 text-right">
                                <a class="h6 text-decoration-none text-start mr-2" href="{{ route('productDetails', $item->id) }}">{{ $item->name }}</a>
                                <div class="d-flex align-items-center justify-content-between mx-3 mt-2">
                                    <h5 class="text-right">{{ number_format( $item->discounted_price) }} د.ع</h5>
                                    <h6 class="text-muted ml-2">
                                        @if ($item->discount != null && $item->discount != 0)
                                        <del>{{ number_format( $item->exchange_price) }} د.ع</del>
                                        @endif
                                    </h6>
                                </div>

                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- Products End -->



          <!-- Modal -->
          <div class="modal fade" id="makeReviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  ...
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>



        <!-- Footer Area End -->
       @include('main.layout.footer')
        <!-- Footer Area End -->

@include('main.layout.scriptjs')
<!-- Button trigger modal -->
<script>
    $(document).ready(function() {
        $('#makeReviewModal').madal('show');
    });



</script>
    </body>
</html>
