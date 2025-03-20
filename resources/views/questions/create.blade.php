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

            <h6 class="mb-3 text-uppercase">اضافة سؤال وجواب</h6>

            <div class="card">
                <div class="card-body">
                    <div class="p-4 border rounded">
                        <form method="POST" action="{{ route('questions.store') }}" class="g-3"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-md-8">
                                    <label for="question" class="form-label">السؤال</label>
                                    <input type="text" class="form-control" id="question" name="question">

                                    @error('question')
                                        <div class="text-darker">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-md-8">
                                    <label for="answer" class="form-label">الجواب</label>
                                    <input type="text" class="form-control" id="answer" name="answer" />

                                    @error('answer')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                  


                                </div>




                                <div class="col-12">
                                    <button class="btn btn-primary mt-3" type="submit">اضافة سؤال وجواب</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>

@endsection
