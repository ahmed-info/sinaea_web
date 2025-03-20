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
                        <li class="breadcrumb-item active" aria-current="page">تواصل اجتماعي</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-3 text-uppercase">تعديل التواصل الاجتماعي</h6>

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('socials.update') }}" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="facebook" class="form-label">فيسبوك</label>
                            <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $social->facebook ?? '' }}">
                            @error('facebook')
                            <div class="text-danger">
                                {{ $message }}
                            </div>

                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="whatsapp" class="form-label">واتساب</label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $social->whatsapp ?? '' }}">
                            @error('whatsapp')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="instagram" class="form-label">انستكرام</label>
                            <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $social->instagram ?? '' }}">
                            @error('instagram')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="telegram" class="form-label">تليكرام</label>
                            <input type="text" class="form-control" id="telegram" name="telegram" value="{{ $social->telegram ?? '' }}">
                            @error('telegram')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="youtube" class="form-label">يوتيوب</label>
                            <input type="text" class="form-control" id="youtube" name="youtube" value="{{ $social->youtube ?? '' }}">
                            @error('youtube')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="tiktok" class="form-label">تيك توك</label>
                            <input type="text" class="form-control" id="tiktok" name="tiktok" value="{{ $social->tiktok ?? '' }}">
                            @error('tiktok')
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
