<x-layout>
    @slot('title', 'table')
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
                                <form action="{{ route('mediagallery.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row">
                                            @csrf

                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>album</b> </label>
                                                <input readonly required name="title" type="text" class="form-control"
                                                    value="media" placeholder="Title">

                                            </div>

                                            <input name="id" type="hidden" value="{{ $data->id }}">


                                            <input required name="album_id" value="{{ $data->album_id }}" type="hidden"
                                                class="form-control" placeholder="Title">


                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>image</b> </label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input name="image_name" type="file" class="form-control"
                                                            placeholder="image_name">

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <img width="200"
                                                            src="{{ asset('upload/mediagallery/' . $data->image_name) }}"
                                                            alt="">

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>Video Link</b> </label>
                                                <input value="{{ $data->link }}" required name="link" type="text"
                                                    class="form-control" placeholder="link	">

                                            </div>


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
