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
                            <form action="{{ route('teacher.update') }}" method="POST" enctype="multipart/form-data">
                                <div class="container">
                                    <div class="row">
                                        @csrf

                                        <input type="hidden" name="id" value="{{ $data->id }}" id="">

                                        <div class="form-group col-sm-4">

                                            <label for="" class="text-dark"> <b>Type</b> </label>
                                            <select required name="type" type="text" class="form-control"
                                                placeholder="Title">
                                                <option value="{{ $data->type }}">{{ $data->type }} </option>
                                                <option value="faculty">Faculty</option>
                                                <option value="hod">Head Of Department</option>
                                                <option value="hou">Head Of University</option>
                                                <option value="others">Others</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <?php         $categories=DB::table('categorie')->get();
                                            ?>
                                            <label for="" class="text-dark"> <b>Department</b> </label>
                                            <select required name="department" type="text" class="form-control"
                                                placeholder="Title">
                                                <option value="{{ $data->department }}">{{ $data->department }}
                                                </option>
                                                @foreach ($categories as $categorie )
                                                <option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Name</b> </label>
                                            <input required name="name" type="text" class="form-control"
                                                value="{{ $data->name }}" placeholder="Name">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Desingnation</b> </label>
                                            <input required name="designation" type="text" class="form-control"
                                                value="{{ $data->designation }}" placeholder="Course">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Email Id</b> </label>
                                            <input required name="emailid" type="text" class="form-control"
                                                value="{{ $data->emailid }}" placeholder="Batch">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b> Phone number </b> </label>
                                            <input value="{{ $data->phone }}"  name="phone" type="text" maxlength="12" class="form-control"
                                                placeholder=" Phone number	">
            
                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b> Images </b> </label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input name="image_name" accept="image/*" type="file"
                                                        class="form-control" placeholder="Images	">
                                                </div>
                                                <div class="col-sm-6">
                                                    <img width="150"
                                                        src="{{ asset('upload/teacher/' . $data->image_name) }}" alt="">

                                                </div>

                                            </div>


                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b> Resume </b> </label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input name="resume" accept="application/pdf" type="file"
                                                        class="form-control" placeholder="Images	">
                                                </div>
                                                <div class="col-sm-6">
                                                    <a href="{{ asset('upload/teacher/' . $data->resume) }}"
                                                        target="_blank">
                                                        <object data="{{ asset('upload/teacher/' . $data->resume) }}"
                                                            type="application/pdf" width="100" height="100">

                                                        </object></a>

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
                                            <textarea required name="description" type="text"
                                                class="form-control ckeditor"
                                                placeholder="description">{{ $data->description }}</textarea>

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