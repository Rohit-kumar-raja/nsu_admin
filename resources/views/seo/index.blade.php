<x-layout>
    @slot('title', 'seo')
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
                @include('seo.insert')
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h2>SEO</h2>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active">SEO</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 row">
                            <div class="col-6">
                                <h6 class="m-0 font-weight-bold text-primary">SEO </h6>
                            </div>
                            <div class="col-6"> <button type="button" class="btn btn-primary btn-sm float-right "
                                    data-toggle="modal" data-target=".bd-example-modal-lg">Add</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-dark">
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Page Name </th>
                                            <th>Type </th>
                                            <th>Action 1</th>
                                            <th>Action 2</th>
                                            <th>Action 2</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tfoot class="text-dark">
                                        <tr>
                                            <th>S.NO</th>
                                            <th>Page Name </th>
                                            <th>Type </th>
                                            <th>Action 1</th>
                                            <th>Action 2</th>
                                            <th>Action 2</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($data as $seo)
                                        <tr>

                                            <td> {{ $loop->iteration + $data->firstItem() - 1 }}
                                                <?php         $pages=DB::table('pages')->find($seo->page_id);
?>
                                            <td> {{ $pages->title }} </td>
                                            <td> {{ $pages->page_type }} </td>
                                            <td><a href="   {{ route('seo.show',$seo->id) }}"
                                                    class="btn btn-info btn-sm"><i class="far fa-eye"></i></a>
                                            </td>
                                            <td><a href="{{ route('seo') }}/update/{{ $seo->id }}"
                                                    class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                                            </td>
                                            <td><a href="{{ route('seo') }}/delete/{{ $seo->id }}"
                                                    class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                            <td><a href="{{ route('seo') }}/status/{{ $seo->id }}" class="btn @if ( $seo->is_deleted==1)
                                                                btn-success
                                                                @endif btn-secondary  btn-sm"> @if (
                                                    $seo->is_deleted==1) Active @else Deactive @endif</a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $data->onEachSide(-1)->links() }}

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