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
                            <li class="breadcrumb-item active" aria-current="page">الطلبات</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')

            </div>
            <!--end breadcrumb-->

            <div class="card" dir="rtl">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">

                        <div class="position-relative">
                            <input type="text" class="form-control ps-5 radius-30" placeholder="بحث">
                            <span
                                class="position-absolute top-50 product-show translate-middle-y"><iclass="bx bx-search"></iclass=>
                            </span>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>اسم الزبون</th>
                                    <th>رقم الموبايل</th>
                                    <th>نوع المستخدم</th>
                                    <th>العنوان</th>
                                    <th>الحالة</th>
                                    <th>الملاحظة</th>
                                    <th>الحدث</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($orders->count() > 0)
                                    @foreach ($orders as $index => $order)
                                        <tr>

                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div class="">
                                                    <i class='bx bxs-circle me-1'></i>{{ $order->user->name }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="">
                                                    {{ $order->user->phone }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    {{ $order->user->isSupplier ? 'مورد' : 'زبون' }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="">
                                                    {{ $order->address }}
                                                </div>
                                            </td>

                                            <td>
                                                <div class="">
                                                    {{ $order->status }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="">
                                                    {{ $order->notes }}
                                                </div>
                                            </td>


                                            <td>

                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('orders.show', $order) }}" class="">
                                                        <i class="lni lni-eye"></i>
                                                    </a>
                                                    <a href="{{ route('orders.edit', $order) }}" class="mx-2"><i
                                                            class='bx bxs-edit'></i>
                                                        </a>
                                                    <form action="{{ route('orders.destroy', $order) }}" method="POST" id="myform">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="custom-btn"><i
                                                                class='bx bxs-trash'></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
