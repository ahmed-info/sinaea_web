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
                        <li class="breadcrumb-item active" aria-current="page">ماركة</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-3 text-uppercase">اضافة ماركة</h6>
        @if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('image') }}</span>
    @else
    <span class="text-danger">{{$errors->first('name') }}</span>
@endif
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('brands.store') }}" class="g-3" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="name" class="form-label">اسم الماركة</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                <dive class="text-danger">{{ $errors->first('name') }}</dive>

                                @endif
                            </div>

                            <div class="col-md-4">
                                <label for="image" class="form-label">صورة الماركة</label>
                                <input class="form-control" type="file" id="image" name="image">
                                @error('image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>



                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">اضافة ماركة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
