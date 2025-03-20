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

            <div class="card">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">
                        <div class=""><a href="{{ route('questions.create') }}"
                            class="btn btn-primary radius-30 mt-2 mt-lg-0"><i class="bx bxs-plus-square"></i>اضافة سؤال جديد</a></div>
                        <div class="position-relative">
                            <input type="text" class="form-control ps-5 radius-30" placeholder="بحث"> <span
                                class="position-absolute top-50 product-show translate-middle-y"><i
                                    class="bx bx-search"></i></span>
                        </div>

                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>السؤال</th>
                                    <th>الجواب</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($questions->count() > 0)
                                    @foreach ($questions as $index => $question)
                                        <tr>

                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div>
                                                {{ $question->question }}
                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                {{ $question->answer }}
                                                </div>
                                            </td>


                                            <td>
                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('questions.edit', $question) }}" class=""><i
                                                            class='bx bxs-edit'></i></a>
                                                    <form action="{{ route('questions.destroy', $question) }}"
                                                        method="POST" class="mr-2" id="myform">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="custom-btn ms-3 show_confirm"><i
                                                                class='bx bxs-trash'></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
