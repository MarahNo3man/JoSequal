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
                        <h4 class="mb-sm-0">All Employees</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">All Employees</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">All Employees</h4>
                            <div class="text-end mb-3">
                                <a href="{{ route('admin.create-employees') }}" class="btn btn-success">Create</a>

                            </div>
                            <table class="table table-bordered dt-responsive "
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>phone</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @if (isset($employees) && $employees->count() > 0)
                                        @foreach ($employees as $index => $employee)
                                            <tr>
                                                <td> {{ $employee?->company?->name }}
                                                </td>
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
                                        @endforeach
                                    @endif


                                </tbody>
                            </table>
                            {!! $employees->links('pagination::bootstrap-4') !!}

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
