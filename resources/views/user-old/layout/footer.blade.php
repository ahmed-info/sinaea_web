    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                                <li><a href="tel:07741000130"><i class="fa fa-phone"></i>07741000130</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Categories</h3>
                            <ul class="footer-links">
                                @if (count($categories) == 0)
                                    <li><a href="#">No Category Found</a></li>
                                @else
                                    @foreach ($categories as $category)
                                        <li><a
                                                href="{{ route('productByCategory', $category->slug) }}">{{ $category->title }}</a>
                                        </li>
                                    @endforeach
                                @endif




                            </ul>
                        </div>
                    </div>

                    <div class="clearfix visible-xs"></div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Brands</h3>
                            <ul class="footer-links">
                                @if (count($brands) == 0)
                                    <li><a href="#">No Brand Found</a></li>
                                @else
                                    @foreach ($brands as $brand)
                                        <li><a href="{{ route('productByBrand', $brand->slug) }}">{{ $brand->title }}</a></li>
                                    @endforeach

                                @endif

                            </ul>
                        </div>
                    </div>

                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">Service</h3>
                            <ul class="footer-links">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">View Cart</a></li>
                                <li><a href="#">Wishlist</a></li>
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="#">Help</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">
                        <ul class="footer-payments">
                            <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                            <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                            <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                        </ul>
                        <span class="copyright">
                            <a target="_blank" href="https://www.templateshub.net">Templates Hub</a>
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="{{ asset('userAssets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('userAssets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('userAssets/js/slick.min.js') }}"></script>
    <script src="{{ asset('userAssets/js/nouislider.min.js') }}"></script>
    <script src="{{ asset('userAssets/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('userAssets/js/main.js') }}"></script>
