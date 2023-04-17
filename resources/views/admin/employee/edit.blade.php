@extends('admin.layouts.app')
@section('admin_css')
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Employee</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index-employees') }}">All Employees</a>
                                </li>
                                <li class="breadcrumb-item active">edit Employee</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.update-employees', [$employee->id]) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3 my-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Companies</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="company_id" data-live-search="true">
                                            @if (isset($companies) && $companies->count() > 0)
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}"
                                                        @if ($company->id == $employee->company_id) selected @endif>
                                                        {{ $company->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <strong class="text-danger">
                                            @error('firstName')
                                                (
                                                {{ $message }} )
                                            @enderror
                                        </strong>
                                    </div>
                                </div>

                                <div class="row mb-3 my-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">First Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="firstName" required
                                            value="{{ $employee->firstName }}">
                                        <strong class="text-danger">
                                            @error('firstName')
                                                (
                                                {{ $message }} )
                                            @enderror
                                        </strong>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-2 col-form-label"> Last Name </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="lastName" required
                                            value="{{ $employee->lastName }}">
                                        <strong class="text-danger">
                                            @error('lastName')
                                                ( {{ $message }} )
                                            @enderror
                                        </strong>
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-2 col-form-label"> Email </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" name="email"
                                            value="{{ $employee->email }}">
                                        <strong class="text-danger">
                                            @error('email')
                                                ( {{ $message }} )
                                            @enderror
                                        </strong>
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-2 col-form-label"> Phone </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="tel" name="phone"
                                            value="{{ $employee->phone }}">
                                        <strong class="text-danger">
                                            @error('phone')
                                                ( {{ $message }} )
                                            @enderror
                                        </strong>
                                    </div>
                                </div>




                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Update">
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection

@section('admin_javascrips')
@endsection
