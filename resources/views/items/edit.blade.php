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
                            <li class="breadcrumb-item active" aria-current="page">Category</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')
            </div>

            <!--end breadcrumb-->

            <h6 class="mb-0 text-uppercase">تعديل المنتج</h6>

            <div class="card mt-3">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        <form method="POST" action="{{ route('items.update', $item->id) }}" enctype="multipart/form-data"
                            class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-4">
                                <label for="category_id" class="form-label">اختر القسم</label>
                                <select class="form-select" id="category_id" name="category_id">
                                    <option selected disabled value="">اختر القسم</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $item->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="brand_id" class="form-label">اختر الماركة</label>
                                <select class="form-select" id="brand_id" name="brand_id">
                                    <option selected disabled value="">اختر الماركة</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand->id == $item->brand_id ? 'selected' : '' }}>{{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="col-md-4">
                                <label for="name" class="form-label">اسم المنتج</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $item->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="cost_price" class="form-label">سعر الكلفة</label>
                                <input type="number" class="form-control" id="cost_price" name="cost_price"
                                    value="{{ $item->cost_price }}">
                                @error('cost_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="supplier_price">سعر البيع بالجملة</label>
                                <input type="number" class="form-control" id="supplier_price" name="supplier_price"
                                    value="{{ $item->supplier_price }}">
                                @error('supplier_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="user_price">سعر البيع بالمفرد</label>
                                <input type="number" class="form-control" id="user_price" name="user_price"
                                    value="{{ $item->user_price }}">
                                @error('user_price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="discount">السعر بعد التخفيض</label>
                                <input type="number" class="form-control" id="discount" name="discount"
                                    value="{{ $item->discount }}">
                                @error('discount')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="active" name="active"
                                        value="{{ $item->active }}" {{ $item->active == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="active">فعال</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value={{ $item->available }}
                                        id="available" name="available" {{ $item->available == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label" for="available">متاح</label>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <label for="image" class="form-label d-block">صورة المنتج اختياري</label>
                                <img src="{{ asset('images/' . $item->image) }}" width="150" alt="">
                                <input class="form-control mt-2" type="file" id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">
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
