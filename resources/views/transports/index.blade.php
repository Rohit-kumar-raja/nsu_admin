<x-layout>
    @slot('title', 'Transports')
    @slot('body')


        <!-- Page Wrapper -->
        <div id="wrapper">

            @include('include.aside')
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    @include('include.navbar')
                    <!-- End of Topbar -->
                    {{-- adding the model --}}
                    @include('transports.insert')
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h2>Transports</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                                            <li class="breadcrumb-item active">Transports</li>
                                        </ol>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Transports </h6>
                                </div>
                                <div class="col-6"> <button type="button"
                                        class="btn btn-primary btn-sm float-right " data-toggle="modal"
                                        data-target=".bd-example-modal-lg">Add</button>
                                </div>
                            </div>
                            @if (session('store'))
                                <div class="alert alert-success">
                                    {{ session('store') }}
                                </div>
                            @endif
                            @if (session('delete'))
                                <div class="alert alert-danger">
                                    {{ session('delete') }}
                                </div>
                            @endif
                            @if (session('update'))
                                <div class="alert alert-success">
                                    {{ session('update') }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-secondary">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('status1'))
                                <div class="alert alert-success">
                                    {{ session('status1') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-dark">
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Stop </th>
                                                <th>Bus Name/No</th>
                                                <th>Time </th>
                                                <th>Action 1</th>
                                                <th>Action 2</th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tfoot class="text-dark">
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Stop </th>
                                                <th>Bus Name/No</th>
                                                <th>Time </th>
                                                <th>Action 1</th>
                                                <th>Action 2</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            @foreach ($data as $transportss)
                                                <tr>


                                                    <td> {{ $loop->iteration + $data->firstItem() - 1 }}

                                                    <td> {{ $transportss->stop }} </td>
                                                    <?php $bus = DB::table('routes')->find($transportss->bus_id);
                                                    ?>

                                                    <td> {{ $bus->name }} ({{ $bus->bus_no }}) </td>

                                                    <td> {{ $transportss->time }} </td>
                                                    <td><a href="{{ route('transports') }}/update/{{ $transportss->id }}"
                                                            class="btn btn-warning btn-sm"><i
                                                                class="far fa-edit"></i></a>
                                                    </td>
                                                    <td><a href="{{ route('transports') }}/delete/{{ $transportss->id }}"
                                                            class="btn btn-danger btn-sm"><i
                                                                class="fas fa-trash-alt"></i></a>
                                                    </td>
                                                    <td><a href="{{ route('transports') }}/status/{{ $transportss->id }}"
                                                            class="btn @if ($transportss->status == 1)
                                                                btn-success
                                                                @endif btn-secondary  btn-sm">
                                                            @if ($transportss->status == 1) Active @else Deactive @endif</a>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>

            </div>

        </div>
        <!-- Scroll to Top Button-->



    @endslot
</x-layout>



<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>
