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
                        <li class="breadcrumb-item active" aria-current="page">القسم الخارجي</li>
                    </ol>
                </nav>
            </div>
            @include('admin.layout.settings')

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-3 text-uppercase">اضافة قسم خارجي</h6>

        <div class="card">
            <div class="card-body">
                <a class="btn btn-success mb-3 " href="{{ url()->previous() }}">رجوع</a>
                <div class="p-4 border rounded">
                    <form method="POST" action="{{ route('external-category-items.store') }}" class="g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <div class="form-group"><input type="hidden" name="external_category_id " value="{{$externalCategory->id}}" id="external_category_id">

                                    <label for="name" class="form-label">اسم القسم الخارجي</label>
                                <select name="item_id" class="form-control" id="item_id">
                                    <option value="">اختر المنتج</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                                @error('item_id')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>




                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">اضافة قسم خارجي</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js">

</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#item_id').change(function(event) {
            var item_id = $('#item_id').val();
            var external_category_id = $('#external_category_id').val();
            $.ajax({
                url: "{{ route('external-category-items.store') }}",
                type: 'POST',
                dataType: 'json',
                data: {
                    item_id: item_id,
                    external_category_id: external_category_id,
                    _token: "{{ csrf_token() }}"
                },
                success: function(data) {
                    console.log(data);
                },
                error: function(data) {
                    console.log('THIS IS ERROR');
                }
            });
        });
    });
</script>
@endsection
