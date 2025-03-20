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
                            <li class="breadcrumb-item active" aria-current="page">Add Product Image</li>
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
                        <div class="card-body">
                            @if ($errors->any())
                                <ul class="alert alert-warning">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <form role="form" action="{{ url('productsImages/' . $product->id . '/upload') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Add Images for {{ $product->title }}</label>
                                            <input type="file" name="images[]" multiple class="form-control">
                                            @error('images')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <button class="btn btn-primary" type="submit">Add</button>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    @foreach ($productImages as $prodImg)
                        <img src="{{ asset('images/' . $prodImg->image) }}" alt="" style="width: 100px; height: 100px;">
                        <a href="{{ url('product-image/'.$prodImg->id.'/delete') }}">Delete</a>
                    @endforeach
                </div>

            </div>


        </div>
    </div>

@endsection
