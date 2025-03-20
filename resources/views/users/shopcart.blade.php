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
                            <th>الكمية</th>
                            <th>القيمة</th>
                            <th>خذف</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @if (count($carts) == 0)
                            <tr>
                                <td colspan="5">لا يوجد منتجات في العربة</td>
                            </tr>
                        @endif
                        @foreach ($carts as $cart)
                            <tr>
                                <td class="align-middle">
                                    <img src="{{ asset('images/' . $cart->item->image) }}" alt=""
                                        style="width: 50px;">
                                    {{ $cart->item->name }}
                                </td>
                                @if ($cart->item->discount > 0 || $cart->item->discount != null)
                                    <td class="align-middle">{{ $cart->item->discounted_price }}</td>
                                    @php
                                        $id[] = $cart->item_id;
                                        $quantity[] = $cart->quantity;
                                        $price[] = $cart->item->discounted_price;
                                    @endphp
                                @else


                                    <td class="align-middle">{{ $cart->item->exchange_price }}</td>
                                    @php
                                         $id[] = $cart->item_id;
                                        $quantity[] = $cart->quantity;
                                        $price[] = $cart->item->exchange_price;
                                    @endphp
                                @endif
                                <td class="align-middle">
                                    <div class="input-group mx-auto" style="width: 100px;">
                                        <div class="input-group-btn">

                                            <form method="POST" action="{{ route('decreaseCart', $cart->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="quantity" value="{{ $cart->quantity }}">

                                                <button class="btn btn-sm btn-primary btn-minus" type="submit">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </form>

                                        </div>
                                        <input type="text"
                                            class="form-control form-control-sm bg-secondary border-0 text-center"
                                            value="{{ $cart->quantity }}" name="items[{{ $cart->id }}][quantity]"
                                            readonly>
                                        <div class="input-group-btn">
                                            <form action="{{ route('increaseCart', $cart->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="quantity" value="{{ $cart->quantity }}">

                                                <button class="btn btn-sm btn-primary btn-plus" type="submit">
                                                    <i class="fa fa-plus"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                @if ($cart->item->discount > 0 || $cart->item->discount != null)
                                    <div class="d-none">
                                        {{ $total += $cart->item->discounted_price * $cart->quantity }}

                                    </div>
                                    <td class="align-middle">{{ $cart->item->discounted_price * $cart->quantity }}</td>
                                @else
                                    <div class="d-none">

                                        {{ $total += $cart->item->exchange_price * $cart->quantity }}
                                    </div>
                                    <td class="align-middle">{{ $cart->item->exchange_price * $cart->quantity }}</td>
                                @endif

                                <td class="align-middle">
                                    <form method="POST" action="{{ route('cart.delete', $cart->id) }}">
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
                        class="bg-secondary pr-3">عربة التسوق</span></h5>
                <form method="POST" action="{{ route('order.store') }}">
                    @csrf
                    <input type="hidden" name="total" value="{{ $total }}">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="price[]"
                        value="{{ implode(',', $price)}}">
                    <input type="hidden" name="quantity[]" value="{{ implode(',', $quantity)}}">
                    <input type="hidden" name="id[]" value="{{ implode(',', $id)}}">

                    <div class="bg-light p-30 mb-5">
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
                            <button class="btn btn-block btn-primary font-weight-bold my-3 py-3" type="submit">تأكيد
                                الطلب</button>
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
