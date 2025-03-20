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

        <h6 class="mb-3 text-uppercase">اضافة منتج</h6>

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data" class="row g-3">
                        @csrf

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="category_id" class="form-label">اختر القسم</label>
                                <select class="form-select" id="category_id" name="category_id">
                                    <option selected disabled value="">اختر القسم</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                            {{ $category->name }}
                                        </option>

                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="brand_id" class="form-label">اختر الماركة</label>
                                <select class="form-select" id="brand_id" name="brand_id">
                                    <option selected disabled value="">اختر الماركة</option>
                                    @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                        {{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="name" class="form-label">اسم المنتج</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="image" class="form-label">صورة اختياري</label>
                                <input class="form-control" type="file" id="image" name="image">
                                @error('image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <div class="col-md-4">
                                <label for="isDollar" class="form-label mt-3">هل السعر بالدولار؟</label>
                                <input type="checkbox" class="form-check" id="isDollar" name="isDollar" value="1" {{ old('isDollar') == 1 ? 'checked' : '' }}>
                                @error('isDollar')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="cost_price" class="form-label mt-3">سعر الكلفة</label>
                                <input type="number" class="form-control" id="name" name="cost_price" value="{{ old('cost_price') }}">
                                @error('cost_price')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="supplier_price" class="form-label mt-3">سعر البيع بالجملة</label>
                                <input type="number" class="form-control" id="supplier_price" name="supplier_price" value="{{ old('supplier_price') }}">
                                @error('supplier_price')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="user_price" class="form-label mt-3">سعر البيع بالمفرد</label>
                                <input type="number" class="form-control" id="user_price" name="user_price" value="{{ old('user_price') }}">
                                @error('user_price')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="discount" class="form-label mt-3">تخفيض بالنسبة المؤية %</label>
                                <input type="number" class="form-control" id="discount" name="discount" value="{{ old('discount') }}">
                                @error('discount')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <div class="col-md-4 d-flex justify-content-center align-items-center">
                                <div>
                                    <span for="available" class="form-label mt-3">متاح</span>
                                    <input type="checkbox" class="form-check" id="available" checked name="available" value="1" {{ old('available') == 1 ? 'checked' : '' }}>
                                    @error('available')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="ms-5">
                                    <span for="available" class="form-label mt-3">فعال</span>
                                    <input type="checkbox" class="form-check" id="active" checked name="active" value="1" {{ old('active') == 1 ? 'checked' : '' }}>
                                    @error('active')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>







                        <div class="col-12">
                            <button class="btn btn-primary mt-3" type="submit">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
