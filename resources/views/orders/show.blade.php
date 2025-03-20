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
                        <li class="breadcrumb-item active" aria-current="page">الطلب</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-3 text-uppercase">تفاصيل الطلبية</h6>


        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <div class="row g-3" enctype="multipart/form-data">

                        <div class="col-md-3">
                            <label for="status" class="form-label">اسم الزبون</label>
                            <h5 class="form-label">{{ $order->user->name }}</h5>
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label">رقم الموبايل</label>
                            <h5 class="form-label">{{ $order->user->phone }}</h5>
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label">العنوان</label>
                            <h5 class="form-label">{{ $order->address }}</h5>
                        </div>

                        <div class="col-md-3">
                            <label for="status" class="form-label">ملاحظة</label>
                            <h5 class="form-label">{{ $order->notes }}</h5>
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label">تاريخ الطلبية</label>
                            <h5 class="form-label">{{ $order->created_at->format('Y-m-d') }}</h5>
                        </div>

                        <div class="col-md-3">
                            <label for="isSupplier" class="form-label">نوع المستخدم</label>
                            <h5 class="form-label">{{ $order->user->isSupplier ? 'مورد': 'زبون' }}</h5>
                        </div>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>اسم المنتج</th>
                                        <th>الكمية</th>
                                        <th>السعر</th>
                                        <th>القيمة</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($order->count() > 0)
                                        @if ($order->records->count() > 0)
                                            @foreach ($order->records as $index => $record)
                                                <tr>

                                                    <td>{{ $index + 1 }}</td>
                                                    <td>
                                                        <div class="">
                                                           {{ $record->item->name }}
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="">
                                                           {{ $record->quantity }}
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="">
                                                            {{ $record->price }}
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="">
                                                           {{ $record->quantity * $record->price }}
                                                        </div>
                                                    </td>

                                                </tr>
                                            @endforeach
                                            <tr class="mt-3">
                                                <th class="font-bold">الاجمالي</th>
                                                <th>{{ $order->items->sum('quantity') }}</th>
                                                <th>{{ $order->items->sum('price') }}</th>
                                                <th>{{ $order->total_price }}</th>
                                            </tr>

                                        @endif
                                    @endif


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
