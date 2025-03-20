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

            <h6 class="mb-3 text-uppercase">تعديل المستخدم</h6>

            <div class="card">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        <form method="POST" action="{{ route('users.update', $user) }}" class="row g-3"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-md-4">
                                <label for="name" class="form-label">اسم المستخدم</label>
                                <input type="text" class="form-control" id="title" name="name"
                                    value="{{ $user->name }}">
                                @error('title')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="col-md-4">
                                <label for="description" class="form-label">نوع المستخدم</label>
                                <select class="form-select" name="isSupplier">
                                    <option value="1" {{ $user->isSupplier == 1 ? 'selected' : '' }}>مورد</option>
                                    <option value="0" {{ $user->isSupplier == 0 ? 'selected' : '' }}>مستخدم</option>
                                </select>
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
