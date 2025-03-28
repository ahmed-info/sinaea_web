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
                        <li class="breadcrumb-item active" aria-current="page">مدونة</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-3 text-uppercase">اضافة مدونة</h6>

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('blogs.store') }}" class="g-3" enctype="multipart/form-data">
                        @csrf

                        <div class="row">

                            <div class="col-md-8 mb-3">
                                <label for="title" class="form-label">عنوان المدونة</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                                @error('title')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-8">
                                <label for="image" class="form-label">صورة المدونة</label>
                                <input class="form-control" type="file" id="image" name="image">
                                @error('image')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="col-md-8 mb-3">
                                <h6 class="mb-0 text-uppercase">تفاصيل</h6>
                                        <hr />
                                        <h4 class="mb-4">تفاصيل (المحتوى)</h4>
                                        <textarea id="summernote2" name="content"></textarea>

                            </div>





                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">اضافة مدونة</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js'></script>


<script>
    $(document).ready(function() {
        $('#summernote2').summernote({
            tabsize: 2,
            height: 200
        });
    });
</script>
@endsection
