<footer class="footer-area footer-bg">
    <div class="container">
        <div class="footer-top pt-100 pb-70">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-widget">
                        {{-- <div class="footer-logo">
                            <a href="/">
                                <img src="{{ asset('mainasset/images/logos/logo-1.png') }}" alt="Images">
                            </a>
                        </div> --}}
                        <p>
                            نسعى لصناعة علامة تجارية موثوقة توفر منتجات اصلية ذات مناشئ عالمية بمواصفات رصينة.
                        </p>
                        <div class="footer-call-content">
                            <h3>تواصل معنا</h3>
                            <span><a href="tel:{{ $callUs->phone }}">{{ $callUs->phone }}</a></span>
                            <i class='bx bx-headphone'></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>الاقسام</h3>
                        <ul class="footer-list">
                            @forelse ($categories as $category)
                            <li>
                                <a href="{{ route('itemsByCategory', $category->id) }}" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    {{ $category->name }}
                                </a>
                            </li>
                            @empty

                            @endforelse


                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>الماركات</h3>
                        <ul class="footer-list">
                            @forelse ($brands as $brand)
                            <li>
                                <a href="{{ route('itemsByBrand', $brand->id) }}" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    {{ $brand->name }}
                                </a>
                            </li>
                            @empty

                            @endforelse


                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widget pl-2">
                        <h3>العروض</h3>
                        <ul class="footer-list">
                            @forelse ($externalCategories as $externalCategory)
                            <li>
                                <a href="{{ route('itemsByExternal', $externalCategory->id) }}" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    {{ $externalCategory->name }}

                                </a>
                            </li>
                            @empty
                            <li>
                                <a href="#" target="_blank">
                                    <i class='bx bx-chevron-right'></i>
                                    لاتوجد عروض حاليا
                                </a>
                            </li>

                            @endforelse


                        </ul>
                    </div>
                </div>




            </div>
        </div>

        <div class="copy-right-area">
            <div class="copy-right-text">
                <p>
                    Copyright © <script>document.write(new Date().getFullYear())</script> جميع الحقوق محفوظة
                    <a href="/" target="_blank">لعدد صناعية</a>
                </p>
            </div>
        </div>
    </div>
</footer>
