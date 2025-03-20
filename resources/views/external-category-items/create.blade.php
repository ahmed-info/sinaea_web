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
                        <li class="breadcrumb-item active" aria-current="page">ماركة</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-3 text-uppercase">اضافة ماركة</h6>
        @if ($errors->has('name'))
    <span class="text-danger">{{ $errors->first('image') }}</span>
    @else
    <span class="text-danger">{{$errors->first('name') }}</span>
@endif
        <div class="card">
            <div class="card-body">
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('external-category-items.store') }}" class="g-3" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="external_category_id" class="form-label">اختر القسم الخارجي</label>
                                <select class="form-select" id="external_category_id" name="external_category_id">

                                    <option selected disabled value="">اختر القسم الخارجي</option>
                                    @forelse ( $externalCategories as $externalCategory )
                                    <option value="{{ $externalCategory->id }}">{{ $externalCategory->name }}</option>

                                    @empty
                                    <option value="">اضف الاقسام الخارجية اولا</option>

                                    @endforelse
\                                </select>
                                @error('external_category_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="item_id" class="form-label">اختر المنتج</label>
                                <select class="form-select" id="item_id" name="item_id">

                                    <option selected disabled value="">اختر المنتج</option>
                                    @forelse ( $items as $item )
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>

                                    @empty
                                    <option value="">اضف المنتجات اولا</option>

                                    @endforelse
\                                </select>
                                @error('item_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>





                            <div class="col-12">
                                <button class="btn btn-primary mt-3" type="submit">اضافة منتج للاقسام الخارجية</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection
