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
                            <li class="breadcrumb-item active" aria-current="page">سياسة الخصوصية والشروط والاحكام</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')

            </div>
            <!--end breadcrumb-->

            <h6 class="mb-3 text-uppercase">تعديل سياسة الخصوصية والشروط والاحكام</h6>
            <form action="{{ route('privacy.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="card" dir="rtl">
                            <div class="card-body">
                                <h6 class="mb-0 text-uppercase">سياسة الخصوصية</h6>
                                <hr />
                                <h4 class="mb-4">سياسة الخصوصية</h4>
                                <textarea id="summernote" name="privacy_policy">{!! $privacy->privacy_policy !!}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="mb-0 text-uppercase">الشروط والاحكام</h6>
                                <hr />
                                <h4 class="mb-4">الشروط والاحكام</h4>
                                <textarea id="summernote2" name="terms_and_conditions">{!! $privacy->terms_and_conditions !!}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

<button type="submit" class="btn btn-primary">حفظ</button>
            </form>
        </div>


    </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                tabsize: 2,
                height: 200
            });

            $('#summernote2').summernote({
                tabsize: 2,
                height: 200
            });
        });
    </script>
@endsection
