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
                            <li class="breadcrumb-item active" aria-current="page">المستخدمين</li>
                        </ol>
                    </nav>
                </div>
                @include('admin.layout.settings')

            </div>
            <!--end breadcrumb-->

            <div class="card" dir="rtl">
                <div class="card-body">
                    <div class="d-lg-flex align-items-center mb-4 gap-3">



                        <div class="position-relative">
                            <input type="text" class="form-control ps-5 radius-30" placeholder="بحث">
                            <span
                                class="position-absolute top-50 product-show translate-middle-y"><iclass="bx bx-search"></iclass=>
                            </span>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>اسم المستخدم</th>
                                    <th>رقم الموبايل</th>
                                    <th>نوع المستخدم</th>
                                    <th>فعال</th>
                                    <th>الحدث</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count() > 0)
                                    @foreach ($users as $index => $user)
                                        <tr>

                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <div class="">
                                                    {{ $user->name }}
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $user->phone }}
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $user->isSupplier ? 'مورد' : 'عميل' }}
                                                </div>
                                            </td>
                                            <td>
                                                <div>
                                                    {{ $user->active ? 'فعال' : 'غير فعال' }}
                                                </div>
                                            </td>
                                            <td>

                                                <div class="d-flex order-actions">
                                                    <a href="{{ route('users.edit', $user) }}" class=""><i
                                                            class='bx bxs-edit'></i></a>

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
