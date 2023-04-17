@extends('admin.layouts.app')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Create Company</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index-companies') }}">All Companies</a>
                                </li>
                                <li class="breadcrumb-item active">create Company</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">


                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.store-companies') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3 my-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="name" required
                                            value="{{ old('name') }}">
                                        <strong class="text-danger">
                                            @error('name')
                                                (
                                                {{ $message }} )
                                            @enderror
                                        </strong>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-2 col-form-label"> Email </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email') }}">
                                        <strong class="text-danger">
                                            @error('email')
                                                ( {{ $message }} )
                                            @enderror
                                        </strong>
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-search-input" class="col-sm-2 col-form-label"> Website </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="url" name="website"
                                            value="{{ old('website') }}">
                                        <strong class="text-danger">
                                            @error('website')
                                                ( {{ $message }} )
                                            @enderror
                                        </strong>
                                    </div>
                                </div>

                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label"> Logo </label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="logo" value=""
                                            id="logo">
                                        <strong class="text-danger">
                                            @error('logo')
                                                ( {{ $message }} )
                                            @enderror
                                        </strong>
                                    </div>
                                </div>


                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-email-input" class="col-sm-2 col-form-label"></label>

                                    <div class="col-sm-10">
                                        <img class="rounded avatar-lg" id="showLogo"
                                            src="{{ asset('backend\assets\images\no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>

                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Create">
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('#logo').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showLogo').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
