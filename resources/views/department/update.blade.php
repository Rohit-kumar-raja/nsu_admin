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
                            <form action="{{ route('department.update') }}" method="POST" enctype="multipart/form-data">
                                <div class="container">
                                    <div class="row">
                                        @csrf
                                        <input name="id" type="hidden" value="{{ $data->id }}">

                                        <div class="form-group col-sm-4">
                                            <?php         $categories=DB::table('categorie')->get();
                                                                 ?>
                                            <label for="" class="text-dark"> <b>Program</b> </label>
                                            <select required name="program" type="text" class="form-control"
                                                placeholder="program">
                                                <option value="{{ $data->program  }}">{{ $data->program  }}</option>

                                                @foreach ($categories as $categorie )
                                                <option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Course Name</b> </label>
                                            <input required name="course" value="{{ $data->course }}" type="text"
                                                class="form-control" placeholder="Course">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Full Form</b> </label>
                                            <input  name="fullform" value="{{ $data->fullform }}" type="text" class="form-control" placeholder="Full form ">
            
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Banner Image</b> </label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input name="images" type="file" class="form-control"
                                                        placeholder="image_name">

                                                </div>
                                                <div class="col-sm-6">
                                                    {{-- <img width="200" src="data:image/jpeg;base64,<?php //base64_encode($data->images)
?>" alt="lol" /> --}}
                                                    <img width="100"
                                                        src="{{ asset('upload/department/' . $data->images) }}"
                                                        alt="lol" />
                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Fee</b> </label>
                                            <input value="{{ $data->fee }}" required name="fee" type="text"
                                                class="form-control" placeholder="start	">

                                        </div>


                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Status</b> </label>
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