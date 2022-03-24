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
                                <form action="{{ route('testimonial.update') }}" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $data->id }}" id="">

                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>Name</b> </label>
                                                <input required name="testimonial_name" type="text" class="form-control"
                                                    value="{{ $data->testimonial_name }}" placeholder="Name">

                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>Course</b> </label>
                                                <input required name="testimonial_course" type="text" class="form-control"
                                                    value="{{ $data->testimonial_course }}" placeholder="Course">

                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>Batch</b> </label>
                                                <input required name="testimonial_batch" type="text" class="form-control"
                                                    value="{{ $data->testimonial_batch }}" placeholder="Batch">

                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b> Designation </b> </label>
                                                <input required name="testimonial_desig" type="text" class="form-control"
                                                    value="{{ $data->testimonial_desig }}" placeholder="Designation	">

                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b> Company </b> </label>
                                                <input required name="testimonial_company" type="text"
                                                    value="{{ $data->testimonial_company }}" class="form-control"
                                                    placeholder="Company	">

                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b> Images </b> </label>


                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input name="testimonial_image" type="file" class="form-control"
                                                            placeholder="Images	">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <img width="150"
                                                            src="{{ asset('upload/testimonial/' . $data->testimonial_image) }}"
                                                            alt="">

                                                    </div>

                                                </div>


                                            </div>



                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>status</b> </label>
                                                <select required name="is_deleted" type="text" class="form-control"
                                                    placeholder="Title">
                                                    <option value="1">Active</option>

                                                    <option value="0">Deactive</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="" class="text-dark"> <b>Description</b> </label>
                                                <textarea required name="message" type="text" class="form-control ckeditor"
                                                    placeholder="description">{{ $data->message }}</textarea>

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
