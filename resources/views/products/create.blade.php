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
                            <li class="breadcrumb-item active" aria-current="page">Products</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')

            </div>
            <!--end breadcrumb-->

            <h6 class="mb-0 text-uppercase">Add Product</h6>

            <div class="card">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        @if ($errors->any())
                            <ul class="alert alert-warning">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>

                        @endif
                        <form action="{{ route('products.store') }}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="row">

                                <div class="col-md-2">
                                    <label for="category_id">
                                        <h6>Select Category</h6>
                                    </label>

                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">---</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-2">
                                    <label for="brand_id">
                                        <h6>Select Brand</h6>
                                    </label>

                                    <select name="brand_id" id="brand_id" class="form-control">
                                        <option value="">---</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->title }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('brand_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="title">Product title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        value="{{ old('title') }}">
                                    @error('title')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{ old('price') }}">
                                    @error('price')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                </div>

                                <div class="col-md-4 mt-2">
                                    <label for="discount">Discount</label>
                                    <input type="number" class="form-control" id="discount" name="discount"
                                        value="{{ old('discount') }}">
                                    @error('discount')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label class="form-check-label" for="is_active">Display Product</label>
                                    <div class="form-control">

                                        <input class="form-check-input" name="is_active" type="checkbox"
                                            id="is_active" checked="">


                                    </div>
                                </div>




                                <div class="col-md-8">
                                    <label>Description</label>
                                    <textarea name="description" class="mysummernote" id="mysummernote"></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label>Add one Image Or More</label>
                                    <input type="file" name="images[]" class="form-control">
                                    @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>




                                <div class="col-md-12 mt-3">
                                    <button class="btn btn-primary" type="submit">Add Product</button>
                                </div>








                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
