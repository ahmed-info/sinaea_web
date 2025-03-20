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
                            <li class="breadcrumb-item active" aria-current="page">منتجات الاقسام الخارجية</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')

            </div>
            <!--end breadcrumb-->

            <div class="card" dir="rtl">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">

                        <div class="justify-content-start">
                            <a href="{{ route('external-categories.index') }}"
                                class="btn btn-success radius-30 mt-2 mt-lg-0"> رجوع
                            </a>
                            </div>

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
                                    <th>القسم الخارجي</th>
                                    <th>المنتج</th>
                                    <th>الحدث</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($exterItems->count() > 0)
                                    @foreach ($exterItems as $index => $exterItem)
                                        <tr>

                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div>
                                                    <i class='bx bxs-circle me-1'></i>{{ $exterItem->externalCategory->name }}
                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <i class='bx bxs-circle me-1'></i>{{ $exterItem->item->name }}
                                                </div>
                                            </td>


                                            <td>
                                                <div class="d-flex order-actions">
                                                    <form action="{{ route('external-category-items.destroy', $exterItem) }}" method="POST"
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
