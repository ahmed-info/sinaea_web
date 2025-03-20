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

        <h6 class="mb-3 text-uppercase">تعديل الطلب</h6>

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('orders.update', $order) }}" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="status" class="form-label">اختر حالة الطلب</label>
                            <select class="form-select" id="status" name="status">
                                <option selected value="تم الارسال" {{ $order->status == 'تم الارسال' ? 'selected' :'' }}>تم الارسال</option>
                                <option value="تم التجهيز" {{ $order->status == 'تم التجهيز' ? 'selected' :'' }}>تم التجهيز</option>
                                <option value="تم التوصيل" {{ $order->status == 'تم التوصيل' ? 'selected' :'' }}>تم التوصيل</option>
                                <option value="تم الالغاء" {{ $order->status == 'تم الالغاء' ? 'selected' :'' }}>تم الالغاء</option>
                            </select>
                            @error('status')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="isSupplier" class="form-label">اختر نوع الطلب</label>
                            <select class="form-select" id="isSupplier" name="isSupplier">
                                <option value="0" {{ $order->user->isSupplier== 0 ? 'selected' :''  }}>زبون</option>
                                <option value="1" {{ $order->user->isSupplier== 1 ? 'selected' :''  }}>مورد</option>

                            </select>
                            @error('status')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>


                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">تعديل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
