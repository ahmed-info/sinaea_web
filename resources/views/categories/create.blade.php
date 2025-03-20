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
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')
        </div>

        <!--end breadcrumb-->

        <h6 class="mb-3 text-uppercase">اضافة قسم فرعي</h6>

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data" class="row g-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="department_id" class="form-label">اختر القسم الرئيسي</label>
                                <select class="form-select" id="department_id" name="department_id">
                                    <option selected disabled value="">اختر القسم الرئيسي</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">اسم القسم</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="image" class="form-label">صورة اختياري</label>
                                <input class="form-control" type="file" id="image" name="image">
                                @error('image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>




                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">اضافة قسم فرعي</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
