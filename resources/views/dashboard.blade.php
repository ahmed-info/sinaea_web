@if (Auth::user()->email != 'ahmed1@gmail.com')
@php
    // Redirect to a named route
    return redirect()->back();
@endphp
@endif
@extends('admin.layout.layout')
@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">متجر</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">لوحة التحكم</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')
        </div>
        <!--end breadcrumb-->
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <a href="{{ route('departments.index') }}" class="col">
                <div class="card radius-10 bg-primary bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">الاقسام الرئيسية</p>
                                <h4 class="my-1 text-white">{{ $departments }}</h4>
                            </div>
                            <div class="text-white ms-auto font-35">
                                <i class="lni lni-control-panel"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('categories.index') }}" class="col">
                <div class="card radius-10 bg-info bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">الاقسام الفرعية</p>
                                <h4 class="my-1 text-white">{{ $categories }}</h4>
                            </div>
                            <div class="text-white ms-auto font-35">
                                <i class="lni lni-control-panel"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('items.index') }}" class="col">
                <div class="card radius-10 bg-danger bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">المنتجات</p>
                                <h4 class="my-1 text-white">{{ $products }}</h4>
                            </div>
                            <div class="text-white ms-auto font-35">
                                <i class="lni lni-producthunt"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
            <a href="{{ route('brands.index') }}" class="col">
                <div class="card radius-10 bg-warning bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-dark">الماركة</p>
                                <h4 class="text-dark my-1">{{ $brands }}</h4>
                            </div>
                            <div class="text-dark ms-auto font-35">
                                <svg fill="#666666" width="26px" height="26px" viewBox="0 0 14 14" role="img" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="m 7.7215115,7.835445 4.3544155,-2.303813 0,4.987339 L 7.7468165,13 7.7215165,7.784809 M 1.9240383,5.531658 6.2531745,7.886082 6.2278445,13 1.8987349,10.518997 1.9240399,5.556964 M 6.9873475,1 1.8987345,3.936711 6.9873475,6.670899 12.101266,3.936711 6.9873475,1"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('external-categories.index') }}" class="col">
                <div class="card radius-10 bg-warning bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-dark">الاقسام الخارجية</p>
                                <h4 class="text-dark my-1">{{ $externalCategories }}</h4>
                            </div>
                            <div class="text-dark ms-auto font-35">
                                <svg fill="#666666" width="26px" height="26px" viewBox="0 0 14 14" role="img" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="m 7.7215115,7.835445 4.3544155,-2.303813 0,4.987339 L 7.7468165,13 7.7215165,7.784809 M 1.9240383,5.531658 6.2531745,7.886082 6.2278445,13 1.8987349,10.518997 1.9240399,5.556964 M 6.9873475,1 1.8987345,3.936711 6.9873475,6.670899 12.101266,3.936711 6.9873475,1"/></svg>
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <a href="{{ route('slides.index') }}" class="col">
                <div class="card radius-10 bg-danger bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">السلايدات</p>
                                <h4 class="text-white my-1">{{ $slides }}</h4>
                            </div>
                            <div class="text-white ms-auto font-35">
                                <svg fill="#666666" width="26px" height="26px" viewBox="0 0 14 14" role="img" focusable="false" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"><path d="m 7.7215115,7.835445 4.3544155,-2.303813 0,4.987339 L 7.7468165,13 7.7215165,7.784809 M 1.9240383,5.531658 6.2531745,7.886082 6.2278445,13 1.8987349,10.518997 1.9240399,5.556964 M 6.9873475,1 1.8987345,3.936711 6.9873475,6.670899 12.101266,3.936711 6.9873475,1"/></svg>
                            </div>
                        </div>

                    </div>
                </div>
            </a>

            <a href="{{ route('dollars.edit') }}" class="col">
                <div class="card radius-10 bg-success bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">سعر الصرف</p>
                                <h4 class="text-white my-1">{{ $exchagePrice->value }}</h4>
                            </div>
                            <div class="text-white ms-auto font-35">
                                <i class="bx bx-money"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>


            <div class="col">
                <div class="card radius-10 bg-light bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-dark">طلبات تم تجهيزها</p>
                                <h4 class="text-dark my-1">{{ $orderProcessed }}</h4>
                            </div>
                            <div class="text-dark ms-auto font-35">
                                <i class="bx bx-money"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 bg-dark bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">طلبات تم استلامها</p>
                                <h4 class="text-white my-1">{{ $orderSent }}</h4>
                            </div>
                            <div class="text-white ms-auto font-35">
                                <i class="bx bx-money"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col">
                <div class="card radius-10 bg-light bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-dark">طلبات تم الغائها</p>
                                <h4 class="text-dark my-1">{{ $orderCanceled }}</h4>
                            </div>
                            <div class="text-dark ms-auto font-35">
                                <i class="bx bx-money"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card radius-10 bg-primary bg-gradient">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-white">طلبات تم توصيلها</p>
                                <h4 class="text-white my-1">{{ $orderDelivered }}</h4>
                            </div>
                            <div class="text-white ms-auto font-35">
                                <i class="bx bx-money"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>



    </div>
</div>

@endsection
