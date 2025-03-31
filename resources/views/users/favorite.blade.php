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

    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            @php
                $total = 0;
                $quantity = [];
                $price = [];
                $id = [];
            @endphp
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>اسم المنتج</th>
                            <th>السعر</th>
                            <th>اضافة الى السلة</th>
                            <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if (count($favorites) == 0)
                            <tr>
                                <td colspan="5">لا يوجد منتجات في المفضلة</td>
                            </tr>
                        @endif
                        @foreach ($favorites as $favorite)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ asset('images/' . $favorite->item->image) }}" alt=""
                                        style="width: 50px;">
                                    {{ $favorite->item->name }}
                                </td>
                                @if ($favorite->item->discount > 0 || $favorite->item->discount != null)
                                    <td class="align-middle">{{ number_format( $favorite->item->discounted_price) }}</td>
                                    @php
                                        $id[] = $favorite->item_id;
                                        $price[] = $favorite->item->discounted_price;
                                    @endphp
                                @else


                                    <td class="align-middle">{{ number_format( $favorite->item->exchange_price)}}</td>
                                    @php
                                         $id[] = $favorite->item_id;
                                        $price[] = $favorite->item->exchange_price;
                                    @endphp
                                @endif
                                <td class="align-middle">
                                    <div class="input-group mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">

                                            <form method="POST" action="{{ route('addItemToCart', $favorite->item_id) }}">
                                                @csrf
                                                @method('POST')
                                                <button class="btn btn-sm btn-primary" type="submit">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </form>

                                        </div>


                                    </div>
                                </td>


                                <td class="align-middle">
                                    <form method="POST" action="{{ route('favorite.delete', $favorite->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger" type="submit"><i
                                                class="fa fa-times"></i></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            <div class="col-lg-4" dir="rtl">
                <h5 class="section-title position-relative text-uppercase my-3 text-right"><span
                        class="pr-3">عربة التسوق</span></h5>
                <form method="POST" action="{{ route('order.store') }}">
                    @csrf
                    <input type="hidden" name="total" value="{{ $total }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="price[]"
                        value="{{ implode(',', $price)}}">
                    <input type="hidden" name="quantity[]" value="{{ implode(',', $quantity)}}">
                    <input type="hidden" name="id[]" value="{{ implode(',', $id)}}">

                    <div class="bg-light p-30 mb-5" style="border-radius: 10px; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                        <input type="text" class="form-control mb-3" name="address" placeholder="العنوان *">
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <input type="text" class="form-control mb-3" name="notes" placeholder="ملاحظة اختياري">
                        @error('notes')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="border-bottom pb-2">
                            <div class="d-flex justify-content-between mb-3">
                                <h6>السعر</h6>

                                <h6>
                                    {{ $total }}

                                </h6>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h6 class="font-weight-medium">التوصيل</h6>
                                <h6 class="font-weight-medium">0</h6>
                            </div>
                        </div>

                        <div class="pt-2">
                            <div class="d-flex justify-content-between mt-2">
                                <h5>السعر الكلي</h5>
                                <h5> {{ $total }}</h5>
                            </div>
                            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" type="submit">تأكيد الطلب</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- Cart End -->


    <!-- Footer Area End -->
    @include('main.layout.footer')
    <!-- Footer Area End -->

    @include('main.layout.scriptjs')

</body>

</html>
