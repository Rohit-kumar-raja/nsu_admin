<x-layout>
    @slot('title', 'table')
    @slot('body')

    {{-- {{dd($data->images)}} --}}
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

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Page Heading -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h2>Update</h2>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                                        <li class="breadcrumb-item active">Update</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 row">
                            <div class="col-6">
                                <h6 class="m-0 font-weight-bold text-primary">Update </h6>
                            </div>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('studentpdf.update') }}" method="POST" enctype="multipart/form-data">
                                <div class="container">
                                    <div class="row">
                                        @csrf
                                        <input name="id" type="hidden" value="{{ $data->id }}">

                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Title</b> </label>
                                            <input required name="title" value="{{ $data->title }}" type="text"
                                                class="form-control" placeholder="Title">

                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>PDF</b> </label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input name="images"  accept="application/pdf" type="file" class="form-control"
                                                        placeholder="image_name">

                                                </div>
                                                <div class="col-sm-6">

                                                    <a href="{{ asset('upload/pdf/' . $data->images) }}"
                                                        target="_blank">
                                                        <object data="{{ asset('upload/pdf/' . $data->images) }}"
                                                            type="application/pdf" width="100" height="100">
    
                                                        </object></a>
                                                </div>

                                            </div>

                                        </div>
                                        <input type="hidden" name="updated_at" value="{{ date('Y-m-d') }}">

                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>status</b> </label>
                                            <select required name="is_deleted" type="text" class="form-control"
                                                placeholder="Title">
                                                <option value="1">Active</option>

                                                <option value="0">Deactive</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>
                                <hr>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>

                                </div>
                            </form>
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