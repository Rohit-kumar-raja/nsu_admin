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
                                    <form action="{{ route('noticeboard.update') }}" method="POST" enctype="multipart/form-data">
                                        <div class="container">
                                            <div class="row">
                                                @csrf
                                                <input name="id" type="hidden" value="{{ $data->id }}">
                                                <div class="form-group col-sm-4">
                                                    <label for="" class="text-dark"> <b>Notice Name</b> </label>
                                                    <input value="{{ $data->name }}" required name="name" type="text"
                                                        class="form-control" placeholder="name">

                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <?php         $categories=DB::table('course_tbl')->get();
                                                    ?>
                                                    <label for="" class="text-dark"> <b>Department</b> </label>
                                                    <select required name="title" type="text" class="form-control" placeholder="Title">
                                                        <option value="{{ $data->title }}">{{ $data->title }}</option>
                                                        @foreach ($categories as $categorie )
                                                        <option value="{{ $categorie->course }}">{{ $categorie->course }}</option>
                                                        @endforeach
                    
                                                    </select>
                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="" class="text-dark"> <b>Notice (in pdf)</b> </label>
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <input name="images" accept="application/pdf" type="file" class="form-control"
                                                                placeholder="image_name">

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <a href="{{ asset('upload/noticeboard/' . $data->images) }}"
                                                                target="_blank">
                                                                <object data="{{ asset('upload/noticeboard/' . $data->images) }}"
                                                                    type="application/pdf" width="100" height="100">
        
                                                                </object></a>
        
                                                        </div>

                                                    </div>

                                                </div>


                                                </div>
                                                <div class="form-group col-sm-4">
                                                    <label for="" class="text-dark"> <b>Last Date</b> </label>
                                                    <input value="{{ $data->timing }}" required name="timing" type="date" class="form-control" placeholder="end Date	">
                    
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
                                                    <textarea name="descrption" id="description" class="form-control"
                                                        placeholder="Description">{{ $data->descrption }}</textarea>
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
