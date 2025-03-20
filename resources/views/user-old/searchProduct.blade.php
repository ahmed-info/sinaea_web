<!DOCTYPE html>
<html lang="ar">

@include('user.layout.head')

<body>
    <!-- HEADER -->
   @include('user.layout.header')
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    @include('user.layout.navbar')
    <!-- /NAVIGATION -->

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">All Categories</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li class="active">Headphones (227,490 Results)</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->

            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <form action="{{ route('products.filter') }}" method="POST">
                        @csrf
                        <div class="aside">
                            <h3 class="aside-title">Categories</h3>
                            <div class="checkbox-filter">

                                @if ($categories)


                                    @foreach ($categories as $category)
                                        <div class="input-checkbox2">

                                            <input type="checkbox" name="{{ $category->slug }}"
                                                id="{{ $category->slug }}">
                                            <label for="category-1">
                                                <span></span>
                                                {{ $category->title }}
                                                <small>({{ $category->products->count() }})</small>
                                            </label>
                                        </div>
                                    @endforeach

                                @endif



                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Price</h3>
                            <div class="price-filter">
                                <div id="price-slider"></div>
                                <div class="input-number price-min">
                                    <input id="price-min" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input id="price-max" type="number">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Brand</h3>
                            <div class="checkbox-filter">
                                @if ($brands)


                                @foreach ($brands as $brand)
                                    <div class="input-checkbox2">

                                        <input type="checkbox" name="{{ $brand->slug }}"
                                            id="{{ $brand->slug }}">
                                        <label for="category-1">
                                            <span></span>
                                            {{ $brand->title }}
                                            <small>({{ $brand->products->count() }})</small>
                                        </label>
                                    </div>
                                @endforeach

                            @endif


                            </div>
                        </div>
                        <input type="submit" value="Filter" class="primary-btn cta-btn" style="margin-top: 20px;">
                        <!-- /aside Widget -->
                    </form>
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">New Arrive</h3>
                            @foreach ($newProducts as $product)
                            <div class="product-widget">
                                <div class="product-img">
                                    @if (count($product->images) > 0)

                                    <img src="{{ asset('images/'.$product->images[0]->image) }}" alt="">
                                    @else
                                    <img src="{{ asset('images/no-image.png') }}" alt="">
                                    @endif
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{ $product->category->title}}</p>
                                    <h3 class="product-name"><a href="#">{{ $product->title}}</a></h3>
                                    <h4 class="product-price">{{ $product->discount}}<del class="product-old-price">{{ $product->price}}</del>
                                    </h4>
                                </div>
                            </div>
                            @endforeach


                        </div>
                        <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                Sort By:
                                <select class="input-select">
                                    <option value="0">Popular</option>
                                    <option value="1">Position</option>
                                </select>
                            </label>

                            <label>
                                Show:
                                <select class="input-select">
                                    <option value="0">20</option>
                                    <option value="1">50</option>
                                </select>
                            </label>
                        </div>
                        <ul class="store-grid">
                            <li class="active"><i class="fa fa-th"></i></li>
                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                        </ul>
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">
                        @foreach ($products as $i => $product)
                                <!-- product -->
                                <div class="col-md-4 col-xs-6">
                                    <div class="product">
                                        <div class="product-img">
                                            <div class="product-label">
                                                <span class="sale">خصم
                                                    %{{ number_format(100 - ($product->discount / $product->price) * 100) }}</span>
                                                <span class="new">NEW</span>
                                            </div>
                                            @if (count($product->images) > 0)
                                                <img src="{{ asset('images/' . $product->images[0]->image) }}"
                                                    alt="">
                                            @else
                                                <img src="{{ asset('images/no-image.png') }}" alt="">
                                            @endif




                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{ $category->title }}</p>
                                            <h3 class="product-name"><a href="#">{{ $product->title }}</a>
                                            </h3>
                                            <h4 class="product-price">{{ $product->discount }}<del
                                                    class="product-old-price">{{ $product->price }}</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="https://www.instagram.com/zaid.maga/" class="product-btns">


                                                <button class="fa fa-shopping-cart" style="font-size: 30px">
                                                    <span
                                                        class="tooltipp">شراء الان</span>
                                                    </button>
                                            </a>
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="{{ route('productDetails.show', $product->slug) }}"
                                                class="add-to-cart-btn" style="padding: 10px 40px"><i class="fa fa-shopping-cart"></i>
                                                عرض التفاصيل</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /product -->
                            @endforeach







                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    {{-- <div class="store-filter clearfix">
                        <span class="store-qty">Showing 20-100 products</span>
                        <ul class="store-pagination">
                            <li class="active">1</li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </div> --}}
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="newsletter">
                        <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                        <form>
                            <input class="input" type="email" placeholder="Enter Your Email">
                            <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                        </form>
                        <ul class="newsletter-follow">
                            <li>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/zaid.maga/"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /NEWSLETTER -->

@include('user.layout.footer')
    <!-- jQuery Plugins -->


</body>

</html>
