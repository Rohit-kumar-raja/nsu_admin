<x-layout>
    @slot('title', 'Appointment')
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
                            <form action="{{ route('appointment.update') }}" method="POST" enctype="multipart/form-data">
                                <div class="container">
                                    <div class="row">
                                        @csrf
                                        <input name="id" type="hidden" value="{{$data->id}}">

                                        <div class="form-group col-sm-4">
                                            <?php         $categories=DB::table('course_tbl')->get();
                                            ?>
                                            <label for="" class="text-dark"> <b>Course</b> </label>
                                            <select required name="course" type="text" class="form-control" placeholder="Title">
                                                <option value="{{ $data->course }}">{{ $data->course }}</option>

                                                @foreach ($categories as $categorie )
                                                <option value="{{ $categorie->course }}">{{ $categorie->course }}</option>
                                                @endforeach
            
                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Student Name</b> </label>
                                            <input required name="title" value="{{ $data->title }}" type="text"
                                                class="form-control" placeholder="Title">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Company Name (post)</b> </label>
                                            <input value="{{ $data->sub_title }}" required name="sub_title" type="text"
                                                class="form-control" placeholder="Company and post name">

                                        </div>
                                        
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b> Student Image</b> </label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input accept="image/*" name="image_name1" type="file"
                                                        class="form-control" placeholder="image_name">

                                                </div>
                                                <div class="col-sm-6">
                                                    <img width="100"
                                                        src="{{asset('upload/appointment/'.$data->image_name)}}" alt="">

                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Appointment Letter</b> </label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input accept="image/*" name="image_name2" type="file"
                                                        class="form-control" placeholder="image_name">

                                                </div>
                                                <div class="col-sm-6">
                                                    <img width="100" src="{{asset('upload/appointment/'.$data->image_name1)}}"
                                                        alt="">

                                                </div>

                                            </div>

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Appointment Letter(in <i class="fas fa-file-pdf  text-danger  "></i>)</b> </label>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <input accept="application/pdf" name="image_name2" type="file"
                                                        class="form-control" placeholder="image_name">

                                                </div>
                                                <div class="col-sm-6">
                                                    <img width="100" src="{{asset('upload/appointment/'.$data->image_name2)}}"
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
                                            <textarea name="description" id="description" class="form-control ckeditor"
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