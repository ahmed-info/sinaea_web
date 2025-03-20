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
                            <li class="breadcrumb-item active" aria-current="page">الاسئلة الشائعة</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')

            </div>
            <!--end breadcrumb-->

            <h6 class="mb-0 text-uppercase">تعديل السؤال والجواب</h6>

            <div class="card mt-3">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        <form method="POST" action="{{ route('questions.update', $question) }}" class="row g-3">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <label for="question" class="form-label">السؤال</label>
                                <input type="text" class="form-control" id="question" name="question"
                                    value="{{ $question->question }}">
                                @error('question')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                            @enderror
                            </div>
                            <div class="col-md-12">
                                <label for="answer" class="form-label">الجواب</label>
                                <input type="text" class="form-control" id="answer" name="answer"
                                    value="{{ $question->answer }}">
                                @error('answer')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>



                            <div class="col-12">
                                <button class="btn btn-primary mt-3" type="submit">تعديل</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
