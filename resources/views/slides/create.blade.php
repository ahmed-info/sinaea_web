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
                        <li class="breadcrumb-item active" aria-current="page">سلايد</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-3 text-uppercase">اضافة سلايد</h6>

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('slides.store') }}" class="g-3" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <label for="brand_id" class="form-label">اختر الماركة</label>
                                <select class="form-select" id="brand_id" name="brand_id">
                                    <option selected disabled value="">اختر الماركة</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('brand_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">عنوان السلايد</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="description" class="form-label">تفاصيل السلايد</label>
                                <input type="text" class="form-control" id="description" name="description" value="{{ old('description') }}">
                                @error('description')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="image" class="form-label">صورة السلايد</label>
                                <input class="form-control" type="file" id="image" name="image">
                                @error('image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">اضافة سلايد</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
