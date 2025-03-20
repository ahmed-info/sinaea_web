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
                            <li class="breadcrumb-item active" aria-current="page">المستخدم</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')

            </div>
            <!--end breadcrumb-->

            <h6 class="mb-0 text-uppercase">تعديل المستخدم</h6>

            <div class="card">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="name" class="form-label">اسم المستخدم</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $user->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
