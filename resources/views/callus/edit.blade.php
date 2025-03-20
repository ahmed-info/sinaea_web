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
                        <li class="breadcrumb-item active" aria-current="page">اتصل بنا</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-3 text-uppercase">تعديل اتصل بنا</h6>

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('call-us.update') }}" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="name" class="form-label">الاسم</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $callUs->name ?? '' }}">
                            @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>

                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">الايميل</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $callUs->email ?? '' }}">
                            @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="phone" class="form-label">رقم الموبايل</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $callUs->phone ?? '' }}">
                            @error('phone')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="address" class="form-label">العنوان</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ $callUs->address ?? '' }}">
                            @error('address')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6 d-flex justify-content-start align-items-top">

                            <div>
                                اوقات العمل
                            </div>
                            <div class="ms-3">
                                <label for="open_time" class="form-label">من الساعة</label>
                            <input type="time" class="form-control" id="open_time" name="open_time" value="{{ $callUs->open_time ?? '' }}">
                            @error('open_time')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                            </div>

                           <div class="ms-3">
                            <label for="close_time" class="form-label">الى الساعة</label>
                            <input type="time" class="form-control" id="close_time" name="close_time" value="{{ $callUs->close_time ?? '' }}">
                            @error('close_time')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                           </div>
                        </div>

                        <div class="col-md-6 d-flex justify-content-between align-items-top">


                            <div class="row">
                                <div class="col-md-6">
                                    <label for="latitude" class="form-label">latitude</label>
                                <input type="text" class="form-control" id="latitude" name="latitude" value="{{ $callUs->latitude ?? '' }}">
                                @error('latitude')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>

                               <div class="col-md-6">
                                <label for="longitude" class="form-label">longitude</label>
                                <input type="text" class="form-control" id="longitude" name="longitude" value="{{ $callUs->longitude ?? '' }}">
                                @error('longitude')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                               </div>
                            </div>
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
