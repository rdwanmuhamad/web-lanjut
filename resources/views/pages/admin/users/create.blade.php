@extends('layouts.backend')

@section('title')
    Admin | User
@endsection

@section('style')
    <!-- Custom styles for this page -->
    <link href="{{ asset('build/assets/backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
             @include('includes.admin.navbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                {{-- <h1 class="h3 mb-2 text-gray-800">Data User</h1> --}}


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Input Data User</h6>
                    </div>
                    <div class="card-body">
                        <form class="user" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mb-6">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Name">
                            </div>
                            <div class="form-group mb-6">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                                    placeholder="name@example.com">
                            </div>
                            <div class="form-group mb-6">
                                <label for="exampleFormControlInput1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control"
                                    id="exampleFormControlInput1" placeholder="Password">
                            </div>
                            <div class="form-group mb-6">
                                <label for="exampleFormControlInput1" class="form-label">Roles</label>
                                <select class="form-select form-control" aria-label="Default select example">
                                    <option selected>Pilihan</option>
                                    <option value="ADMIN">Admin</option>
                                    <option value="USER">User</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        @include('includes.admin.footer')
        <!-- End of Footer -->

    </div>
@endsection

@section('script')
    <!-- Page level plugins -->
    <script src="{{ asset('build/assets/backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/assets/backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('build/assets/backend/js/demo/datatables-demo.js') }}"></script>
@endsection
