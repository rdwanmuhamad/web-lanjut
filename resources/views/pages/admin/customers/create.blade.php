@extends('layouts.backend')

@section('title')
    Admin | Customer
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
                {{-- <h1 class="h3 mb-2 text-gray-800">Data Customer</h1> --}}


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Input Data Customer</h6>
                    </div>
                    <div class="card-body">
                        <form class="customer" method="POST" action="{{ route('customers.store') }}"
                            enctype="multipart/form-data" id="locations">
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
                            <div class="form-group mb-12">
                                <label for="exampleFormControlInput1" class="form-label">Alamat</label>

                                <textarea name="address" id="exampleFormControlInput1" cols="30" rows="10" class="form-control">Alamat</textarea>
                            </div>
                            <div class="form-group mb-6">
                                <label for="exampleFormControlInput1" class="form-label">Provinsi</label>
                                <select name="provinces_id" id="provinces_id" class="form-control" v-model="provinces_id"
                                    v-if="provinces">
                                    <option v-for="province in provinces" :value="province.id">
                                        @{{ province.name }}</option>
                                </select>
                                <select v-else class="form-control"></select>
                            </div>
                            <div class="form-group mb-6">
                                <label for="exampleFormControlInput1" class="form-label">Kota</label>
                                <select name="regencies_id" id="regencies_id" class="form-control" v-model="regencies_id"
                                    v-if="regencies">
                                    <option v-for="regency in regencies" :value="regency.id">
                                        @{{ regency.name }}</option>
                                </select>
                                <select v-else class="form-control"></select>
                            </div>
                            <div class="form-group mb-6">
                                <label for="exampleFormControlInput1" class="form-label">Nomor Telpon</label>
                                <input type="text" name="zip_code" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Kode Pos">
                            </div>
                            <div class="form-group mb-6">
                                <label for="exampleFormControlInput1" class="form-label">Nomor Telpon</label>
                                <input type="text" name="phone_number" class="form-control" id="exampleFormControlInput1"
                                    placeholder="Nomor Telpon">
                            </div>
                            <button type="submit" class="btn btn-primary btn-customer btn-block">
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
    <script src="{{ asset('build/assets/vendor/vue/vue.js') }}"></script>
    <script src="{{ asset('build/assets/backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('build/assets/backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('build/assets/backend/js/demo/datatables-demo.js') }}"></script>

    <script>
        var locations = new Vue({
            el: "#locations",
            mounted() {
                this.getProvincesData();
            },
            data: {
                provinces: null,
                regencies: null,
                provinces_id: null,
                regencies_id: null,
            },
            methods: {
                getProvincesData() {
                    var self = this;
                    axios.get('{{ route('api-provinces') }}')
                        .then(function(response) {
                            self.provinces = response.data;
                        })
                },
                getRegenciesData() {
                    var self = this;
                    axios.get('{{ url('api/regencies') }}/' + self.provinces_id)
                        .then(function(response) {
                            self.regencies = response.data;
                        })
                },
            },
            watch: {
                provinces_id: function(val, oldVal) {
                    this.regencies_id = null;
                    this.getRegenciesData();
                },
            }
        });
    </script>
@endsection
