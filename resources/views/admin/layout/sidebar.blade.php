<div class="sidebar-wrapper" data-simplebar="true" dir="rtl">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo03.jpg') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">صناعية</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu text-right" id="menu" dir="rtl" float="right">
        <li class="{{ request()->routeIs('dashboard') ? 'mm-active' :'' }}">

            <a href="{{ route('dashboard') }}">
                <div class="parent-icon">
                    <i class="bx bx-home-circle"></i>
                </div>
                <div class="menu-title">اللوحة الرئيسية</div>
            </a>

        </li>

        <li class="{{ Request::is('brands') || Request::is('brands/*') ? 'mm-active' :'' }}">

            <a href="{{ route('brands.index') }}">
                <div class="parent-icon">
                    <svg fill="#666666" width="26px" height="26px" viewBox="0 0 14 14" role="img" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="m 7.7215115,7.835445 4.3544155,-2.303813 0,4.987339 L 7.7468165,13 7.7215165,7.784809 M 1.9240383,5.531658 6.2531745,7.886082 6.2278445,13 1.8987349,10.518997 1.9240399,5.556964 M 6.9873475,1 1.8987345,3.936711 6.9873475,6.670899 12.101266,3.936711 6.9873475,1"/></svg>
                </div>
                <div class="menu-title">الماركات</div>
            </a>

        </li>
        <li class="{{ Request::is('departments') || Request::is('departments/*') ? 'mm-active' :'' }}">

            <a href="{{ route('departments.index') }}">
                <div class="parent-icon">
                    <i class="bx bx-category"></i>
                </div>
                <div class="menu-title">الاقسام الرئيسية</div>
            </a>

        </li>
        <li class="{{ Request::is('categories') || Request::is('categories/*') ? 'mm-active' :'' }}">
            <a href="{{ route('categories.index') }}">
                <div class="parent-icon">
                    <i class="lni lni-control-panel"></i>
                </div>
                <div class="menu-title">الاقسام الفرعية</div>
            </a>
        </li>
        <li class="{{ Request::is('items') || Request::is('items/*') ? 'mm-active' :'' }}">
            <a href="{{ route('items.index') }}">
                <div class="parent-icon">
                    <i class="lni lni-producthunt"></i>
                </div>
                <div class="menu-title">المنتجات</div>
            </a>
        </li>

        <li class="{{ Request::is('dollars') ? 'mm-active' :'' }}">

            <a href="{{ route('dollars.edit') }}">
                <div class="parent-icon">
                    <i class="bx bx-money"></i>
                </div>
                <div class="menu-title">سعر الصرف</div>
            </a>
        </li>

        <li class="{{ Request::is('external-categories') || Request::is('external-categories/*') ? 'mm-active' :'' }}">
            <a href="{{ route('external-categories.index') }}">
                <div class="parent-icon">
                    <i class="bx bx-category"></i>
                </div>
                <div class="menu-title">الاقسام الخارجية</div>
            </a>
        </li>

        <li class="{{ Request::is('users') || Request::is('users/*')? 'mm-active' :'' }}">
            <a href="{{ route('users.index') }}">
                <div class="parent-icon">
                    <i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">المستخدمين</div>
            </a>
        </li>

        <li class="{{ Request::is('orders') || Request::is('orders/*') ? 'mm-active' :'' }}">
            <a href="{{ route('orders.index') }}">
                <div class="parent-icon">
                    <svg fill="#666666" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	 width="26px" height="26px" viewBox="0 0 196 260" enable-background="new 0 0 196 260" xml:space="preserve">
<path d="M174.8,66H142V45.778C142,21.639,122.361,2,98.223,2h-0.445C73.639,2,54,21.639,54,45.778V66H21.2L2,258h192L174.8,66z
	 M66,45.778C66,28.255,80.255,14,97.778,14h0.445C115.745,14,130,28.255,130,45.778V66H66V45.778z M60,107.18c-7.18,0-13-5.82-13-13
	c0-5.014,2.843-9.357,7-11.526V93c0,3.313,2.687,6,6,6s6-2.687,6-6V82.654c4.157,2.169,7,6.512,7,11.526
	C73,101.36,67.18,107.18,60,107.18z M136,106.68c-6.9,0-12.5-5.59-12.5-12.5c0-4.726,2.628-8.84,6.5-10.964V93c0,3.313,2.687,6,6,6
	s6-2.687,6-6v-9.784c3.872,2.125,6.5,6.239,6.5,10.964C148.5,101.09,142.9,106.68,136,106.68z"/>
</svg>
                </div>
                <div class="menu-title">الطلبات</div>
            </a>
        </li>

        <li class="{{ Request::is('slides') || Request::is('slides/*') ? 'mm-active' :'' }}">
            <a href="{{ route('slides.index') }}">
                <div class="parent-icon">
                    <i class="fadeIn animated bx bx-slider-alt"></i>
                </div>
                <div class="menu-title">السلايد</div>
            </a>
        </li>

        <li class="{{ Request::is('blogs') ||  Request::is('blogs/*')? 'mm-active' :'' }}">
            <a href="{{ route('blogs.index') }}">
                <div class="parent-icon">
                    <svg fill="#666666" width="26px" height="26px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><path d="M42,57H22A15,15,0,0,1,7,42V22A15,15,0,0,1,22,7H35A15,15,0,0,1,50,22v.5A2.5,2.5,0,0,0,52.5,25,4.5,4.5,0,0,1,57,29.5V42A15,15,0,0,1,42,57ZM22,9A13,13,0,0,0,9,22V42A13,13,0,0,0,22,55H42A13,13,0,0,0,55,42V29.5A2.5,2.5,0,0,0,52.5,27,4.5,4.5,0,0,1,48,22.5V22A13,13,0,0,0,35,9Z"/><path d="M35.5,27h-11a4.5,4.5,0,0,1,0-9h11a4.5,4.5,0,0,1,0,9Zm-11-7a2.5,2.5,0,0,0,0,5h11a2.5,2.5,0,0,0,0-5Z"/><path d="M41.5,45h-17a4.5,4.5,0,0,1,0-9h17a4.5,4.5,0,0,1,0,9Zm-17-7a2.5,2.5,0,0,0,0,5h17a2.5,2.5,0,0,0,0-5Z"/></svg>
                </div>
                <div class="menu-title">المدونة</div>
            </a>
        </li>

        <li class="{{ Request::is('questions') ||  Request::is('questions/*') ? 'mm-active' :'' }}">
            <a href="{{ route('questions.index') }}">
                <div class="parent-icon">
                    <i class="bx bx-question-mark"></i>
                </div>
                <div class="menu-title">الاسئلة الشائعة</div>
            </a>
        </li>

        <li class="{{ Request::is('socials') ? 'mm-active' :'' }}">
            <a href="{{ route('socials.edit') }}">
                <div class="parent-icon">
                    <svg width="26px" height="26px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 3L8.75 7.5L8.61111 8L7.77778 11M5 21L6.94444 14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M19 3L14 21" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M22 9H4" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20 16H2" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                </div>
                <div class="menu-title">التواصل الاجتماعي</div>
            </a>
        </li>

        <li class="{{ Request::is('call-us') ? 'mm-active' :'' }}">
            <a href="{{ route('call-us.edit') }}">
                <div class="parent-icon">
                    <svg version="1.1" id="Uploaded to svgrepo.com" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	 width="26px" height="26px" viewBox="0 0 32 32" xml:space="preserve">
<style type="text/css">
	.feather_een{fill:#0B1719;}
</style>
<path class="feather_een" d="M27,10c0.552,0,1-0.448,1-1V8c0-0.552-0.448-1-1-1h-1V6c0-1.657-1.343-3-3-3H9C7.343,3,6,4.343,6,6v2
	H4.5C4.224,8,4,8.224,4,8.5C4,8.776,4.224,9,4.5,9H6v1H4.5C4.224,10,4,10.224,4,10.5C4,10.776,4.224,11,4.5,11H6v10H4.5
	C4.224,21,4,21.224,4,21.5C4,21.776,4.224,22,4.5,22H6v1H4.5C4.224,23,4,23.224,4,23.5C4,23.776,4.224,24,4.5,24H6v2
	c0,1.657,1.343,3,3,3h14c1.657,0,3-1.343,3-3v-4h1c0.552,0,1-0.448,1-1v-1c0-0.552-0.448-1-1-1h-1v-1h1c0.552,0,1-0.448,1-1v-1
	c0-0.552-0.448-1-1-1h-1v-1h1c0.552,0,1-0.448,1-1v-1c0-0.552-0.448-1-1-1h-1v-1H27z M26,8h1v1h-1V8z M25,26c0,1.105-0.895,2-2,2H9
	c-1.105,0-2-0.895-2-2V6c0-1.105,0.895-2,2-2h14c1.105,0,2,0.895,2,2V26z M27,20v1h-1v-1H27z M27,16v1h-1v-1H27z M27,12v1h-1v-1H27z
	 M18.17,16.062c0.639-0.672,0.977-1.635,0.768-2.676c-0.236-1.179-1.215-2.134-2.399-2.34C14.645,10.717,13,12.167,13,14
	c0,0.801,0.319,1.524,0.83,2.062c-1.122,0.56-1.83,1.706-1.83,2.959V21c0,0.552,0.448,1,1,1h6c0.552,0,1-0.448,1-1v-1.978
	C20,17.768,19.291,16.622,18.17,16.062z M16,12c1.103,0,2,0.897,2,2c0,1.103-0.897,2-2,2s-2-0.897-2-2C14,12.897,14.897,12,16,12z
	 M19,21h-6v-1.585c0-0.986,0.48-1.903,1.288-2.464l0.463-0.231C15.132,16.896,15.553,17,16,17s0.868-0.104,1.249-0.28l0.463,0.231
	C18.52,17.512,19,18.429,19,19.415V21z"/>
</svg>
                </div>
                <div class="menu-title">اتصل بنا</div>
            </a>
        </li>

        <li class="{{ Request::is('privacy') ? 'mm-active' :'' }}">
            <a href="{{ route('privacy.edit') }}">
                <div class="parent-icon">
                    <svg width="26px" height="26px" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">

                        <rect x="0" fill="none" width="20" height="20"/>

                        <g>

                        <path d="M10 9.6c-.6 0-1 .4-1 1 0 .4.3.7.6.8l-.3 1.4h1.3l-.3-1.4c.4-.1.6-.4.6-.8.1-.6-.3-1-.9-1zm.1-4.3c-.7 0-1.4.5-1.4 1.2V8h2.7V6.5c-.1-.7-.6-1.2-1.3-1.2zM10 2L3 5v3c.1 4.4 2.9 8.3 7 9.9 4.1-1.6 6.9-5.5 7-9.9V5l-7-3zm4 11c0 .6-.4 1-1 1H7c-.6 0-1-.4-1-1V9c0-.6.4-1 1-1h.3V6.5C7.4 5.1 8.6 4 10 4c1.4 0 2.6 1.1 2.7 2.5V8h.3c.6 0 1 .4 1 1v4z"/>

                        </g>

                        </svg>
                </div>
                <div class="menu-title">سياسة الخصوصية</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
