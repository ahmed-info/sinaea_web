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
                        <li class="breadcrumb-item active" aria-current="page">السلايد</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-3 text-uppercase">تعديل السلايد</h6>

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('slides.update', $slide) }}" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="brand_id" class="form-label">اختر الماركة</label>
                            <select class="form-select" id="brand_id" name="brand_id">
                                <option selected disabled value="">اختر الماركة</option>
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->id }}"
                                        {{ $brand->id == $slide->brand_id ? 'selected' : '' }}>{{ $brand->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('brand_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        <div class="col-md-6">
                            <label for="title" class="form-label">اسم السلايد</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $slide->title }}">
                            @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="image" class="form-label d-block">صورة السلايد</label>
                            @if ($slide->image)
                                <img src="{{ asset('images/' . $slide->image) }}" alt="" style="width: 150px;">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="" style="width: 150px;">
                            @endif
                            <input class="form-control mt-3" type="file" id="image" name="image">
                            @error('image')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="description" class="form-label">تفاصيل السلايد</label>
                            <textarea class="form-control" rows="5" id="description" name="description">{{ $slide->description }}</textarea>
                            @error('description')
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
