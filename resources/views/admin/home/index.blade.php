@extends('admin.layouts.app')
@section('content')
    <!-- Start Page-content -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row d-flex justify-content-between">
                <div class="col-xl-5 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Companies</p>
                                    <h4 class="mb-2">{{ $companies }}</h4>

                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-primary rounded-3">
                                        <i class="ri-shopping-cart-2-line font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
                <div class="col-xl-5 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <p class="text-truncate font-size-14 mb-2">Total Employees</p>
                                    <h4 class="mb-2">{{ $employees }}</h4>

                                </div>
                                <div class="avatar-sm">
                                    <span class="avatar-title bg-light text-success rounded-3">
                                        <i class="mdi mdi-currency-usd font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->



            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                          
                            <h4 class="card-title mb-4">Newest Companies</h4>

                            <div class="table-responsive">
                                <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Logo</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Website</th>
                                        </tr>
                                    </thead><!-- end thead -->
                                    <tbody>
                                        @if (isset($companies_newest) && $companies_newest->count() > 0)
                                            @foreach ($companies_newest as $company)
                                                <tr>
                                                    <td><img src="{{ asset($company->logo) }}" width="100" height="100"></td>
                                                    <td>
                                                        <h6 class="mb-0">{{ $company->name }}</h6>
                                                    </td>
                                                    <td>{{ $company->email }}</td>
                                                    <td>{{ $company->website }}</td>

                                                </tr>
                                            @endforeach
                                        @else
                                            <div class="alert alert-danger" role="alert">
                                                Not Found Newest Companies
                                            </div>
                                        @endif


                                        <!-- end -->
                                    </tbody><!-- end tbody -->
                                </table> <!-- end table -->
                            </div>
                        </div><!-- end card -->
                    </div><!-- end card -->
                </div>
            </div>
            <!-- end row -->
        </div>

    </div>
@endsection
