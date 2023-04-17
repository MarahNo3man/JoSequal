@extends('admin.layouts.app')
@section('admin_css')
    <!-- Plugins css -->
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Companies</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">All Companies</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Companies</h4>
                            <div class="text-end mb-3">
                                <a href="{{ route('admin.create-companies') }}" class="btn btn-success">Create</a>

                            </div>
                            <table class="table table-bordered dt-responsive "
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Logo</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Website</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @if (isset($companies) && $companies->count() > 0)
                                        @foreach ($companies as $index => $company)
                                            <tr>
                                                <td><img src="{{ asset($company->logo) }}" width="100" height="100">
                                                </td>
                                                <td>
                                                    <h6 class="mb-0">{{ $company->name }}</h6>
                                                </td>
                                                <td>{{ $company->email }}</td>
                                                <td width="300">{{ $company->website }}</td>
                                                <td>
                                                    <a href="{{ route('admin.show-companies', [$company->id]) }}"
                                                        title="Show Default" class="btn btn-light p-1 px-2"><i
                                                            class="ri-eye-line"></i> Show
                                                    </a>

                                                    <a href="{{ route('admin.edit-companies', [$company->id]) }}"
                                                        title="Edit Default" class="btn btn-light p-1 px-2"><i
                                                            class="ri-edit-line"></i> Edit
                                                    </a>
                                                    <a href="{{ route('admin.delete-companies', [$company->id]) }}"
                                                        id="delete" title="Edit Default"
                                                        class="btn btn-danger p-1 px-2"><i class="ri-delete-bin-line"></i>
                                                        Delete
                                                    </a>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif


                                </tbody>
                            </table>
                            {!! $companies->links('pagination::bootstrap-4') !!}

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div>
    </div>
@endsection

@section('admin_javascrips')
    <!-- Plugins js -->
    <!-- Required datatable js -->
    <script src="{{ asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('backend/assets/js/pages/datatables.init.js') }}"></script>
@endsection
