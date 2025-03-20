<nav id="navigation" style="text-align: right; justify-content: flex-start;">
    <!-- container -->
    <div class="container" style="text-align: right; define-content: flex-start;">
        <!-- responsive-nav -->
        <div id="responsive-nav" style="text-align: right; justify-content: flex-start;">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav" style="float: right;justify-content: flex-start;">
                <li class="active"><a href="{{ route('home') }}">Home</a></li>
                @if ($categories)
                    @foreach ($categories as $category)
                        <li><a href="{{ url('productByCategory/'. $category->slug) }}">{{ $category->title }}</a></li>
                    @endforeach

                @endif

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
