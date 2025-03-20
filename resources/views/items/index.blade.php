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
                            <li class="breadcrumb-item active" aria-current="page">المنتجات</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')

            </div>
            <!--end breadcrumb-->

            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <div class=""><a href="{{ route('items.create') }}"
                            class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>اضافة منتج جديد</a></div>
                        <div class="position-relative">
                            <input type="text" class="form-control ps-5 radius-30" placeholder="بحث"> <span
                                class="position-absolute top-50 product-show translate-middle-y"><i
                                    class="bx bx-search"></i></span>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>القسم الرئيسي</th>
                                    <th>الماركة</th>
                                    <th>اسم المنتج</th>
                                    <th>سعر الكلفة</th>
                                    <th>سعر الجملة</th>
                                    <th>سعر المفرد</th>
                                    <th>في المخزن</th>
                                    <th>فعال</th>
                                    <th>صورة</th>
                                    <th>الحدث</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($items->count() > 0)
                                    @foreach ($items as $index => $item)
                                        <tr>

                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div class="badge rounded-pill text-success bg-light-success p-2 px-3">
                                                    <i class='bx bxs-circle me-1'></i>{{ $item->category->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="badge rounded-pill text-success bg-light-success p-2 px-3">
                                                    <i class='bx bxs-circle me-1'></i>{{ $item->brand->name ?? '' }}
                                                </div>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->cost_price }}</td>
                                            <td>{{ $item->supplier_price }}</td>
                                            <td>{{ $item->user_price }}</td>
                                            <td>{{ $item->available == 1 ? 'متاح':'غير متاح' }}</td>
                                            <td>{{ $item->active == 1 ? 'فعال':'غير فعال' }}</td>

                                            <td>
                                                <div>
                                                    @if ($item->image == null)
                                                        <img src="{{ asset('images/no-image.png') }}"
                                                            alt="{{ $item->name }}" class="img-fluid"
                                                            style="width: 50px">
                                                    @else
                                                        <img src="{{ asset('images/' . $item->image) }}"
                                                            alt="{{ $item->name }}" class="img-fluid"
                                                            style="width: 50px">
                                                    @endif

                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('items.edit', $item) }}" class=""><i
                                                            class='bx bxs-edit'></i></a>
                                                    <form action="{{ route('items.destroy', $item) }}" method="POST"
                                                        class="mr-2" id="myform">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="custom-btn ms-3"><i
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
