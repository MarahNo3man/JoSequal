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
                        <h4 class="mb-sm-0">Show Company</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">Show Company</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Show Company</h4>
                            <div class="card d-flex align-items-start flex-row">
                                <img class="card-img-top rounded-circle avatar-lg m-2" src="{{ asset($company->logo) }}"
                                    alt="Card image cap">

                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">{{ $company->name }}</li>
                                    <li class="list-group-item">{{ $company->email }}</li>
                                    <li class="list-group-item"><a href="{{ $company->website }}">Website</a></li>
                                </ul>
                            </div>
                            <table class="table table-bordered dt-responsive "
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($company->employees) && $company->employees->count() > 0)
                                        @foreach ($company->employees as $index => $employee)
                                            <tr>
                                                <td> {{ $employee->firstName }}
                                                </td>
                                                <td>{{ $employee->lastName }}</td>
                                                <td>{{ $employee->email }}</td>
                                                <td>{{ $employee->phone }}</td>
                                                <td>
                                                    <a href="{{ route('admin.edit-employees', [$employee->id]) }}"
                                                        title="Edit Default" class="btn btn-light p-1 px-2"><i
                                                            class="ri-edit-line"></i> Edit
                                                    </a>
                                                    <a href="{{ route('admin.delete-employees', [$employee->id]) }}"
                                                        id="delete" title="Edit Default"
                                                        class="btn btn-danger p-1 px-2"><i class="ri-delete-bin-line"></i>
                                                        Delete
                                                    </a>
                                                </td>

                                            </tr>
                                            </tr>
                                        @endforeach
                                    @endif


                                </tbody>
                            </table>

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
