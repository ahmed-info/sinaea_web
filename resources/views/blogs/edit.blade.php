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
                        <li class="breadcrumb-item active" aria-current="page">المدونة</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-3 text-uppercase">تعديل المدونة</h6>

        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('blogs.update', $blog) }}" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="col-md-8">
                            <label for="title" class="form-label">عنوان المدونة</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}">
                            @error('title')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror

                            <label for="content" class="font-bold mt-3">تفاصيل المدونة</label>
                            <textarea id="mytextarea" class="form-control" rows="5" id="content" name="content">{{ $blog->content }}</textarea>
                            @error('content')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-4">
                            <label for="image" class="form-label d-block">صورة المدونة</label>
                            @if ($blog->image)
                                <img src="{{ asset('images/' . $blog->image) }}" alt="" style="width: 150px;">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" alt="" style="width: 150px;">
                            @endif
                            <input class="form-control mt-3" type="file" id="image" name="image">
                            @error('image')
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
<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js'></script>

<script>
    tinymce.init({
        selector: '#mytextarea'
    });

</script>
@endsection
