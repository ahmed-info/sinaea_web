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
                        <li class="breadcrumb-item active" aria-current="page">الماركة</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">تعديل الماركة</h6>

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('external-category-items.update', $externalCategoryItem) }}" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-4">
                            <label for="external_category_id" class="form-label">اختر القسم الخارجي</label>
                            <select class="form-select" id="external_category_id" name="external_category_id">
                                <option selected disabled value="">اختر القسم</option>
                                @foreach ($exterCategories as $extCategory)
                                    <option value="{{ $extCategory->id }}"
                                        {{ $extCategory->id == $externalCategoryItem->external_category_id ? 'selected' : '' }}>
                                        {{ $extCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="item_id" class="form-label">اختر المنتج</label>
                            <select class="form-select" id="item_id" name="item_id">
                                <option selected disabled value="">اختر المنتج</option>
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $item->id == $externalCategoryItem->item_id ? 'selected' : '' }}>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
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
