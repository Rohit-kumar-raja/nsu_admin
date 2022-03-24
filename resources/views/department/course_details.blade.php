<x-layout>
    @slot('title', 'Course Details')
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

                            @if (session('store'))
                                <div class="alert alert-success">
                                    {{ session('store') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-warning">
                                    {{ session('error') }}
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
                                <form action="{{ route('department.details.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="container">
                                        <div class="row">
                                            @csrf
                                            <input name="id" type="hidden" value="{{ $data->id ?? '' }}">
                                            <input name="course_id" type="hidden" value="{{ $id }}">
                                            <div class="form-group col-sm-4">
                                                <?php $courses = DB::table('course_tbl')->find($id);
                                                
                                                ?>
                                                <label for="" class="text-dark"> <b>Course Name</b> </label>
                                                <select required disabled type="text" class="form-control"
                                                    placeholder="Title">
                                                    <option value="{{ $courses->course }}">{{ $courses->course }}
                                                    </option>

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>Syllabus(Hons)</b> </label>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                       <input name="syllabus" type="file" accept="application/pdf"
                                                            class="form-control" placeholder="syllabus">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        @if ($data != 'null')
                                                            <object
                                                                data="{{ asset('upload/CourseDetails/' . $data->syllabus) ?? '' }}"
                                                                type="application/pdf" width="100" height="100">

                                                            </object>
                                                        @endif
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>Syllabus(Genral - optional )</b> </label>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                       <input name="syllabus1" type="file" accept="application/pdf"
                                                            class="form-control" placeholder="syllabus">
                                                    </div>

                                                    <div class="col-sm-6">
                                                        @if ($data != 'null')
                                                            <object
                                                                data="{{ asset('upload/CourseDetails/' . $data->syllabus1) ?? '' }}"
                                                                type="application/pdf" width="100" height="100">

                                                            </object>
                                                        @endif
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>Fee Schedule</b> </label>

                                                <div class="row">
                                                    <div class="col-sm-6">
                                                       <input name="fee_schedule"
                                                            value="{{ $data->fee_schedule ?? '' }}" type="file"
                                                            accept="application/pdf" class="form-control"
                                                            placeholder="fee_schedule">
                                                        |
                                                    </div>
                                                    <div class="col-sm-6">
                                                        @if ($data != 'null')
                                                            <a href="{{ asset('upload/CourseDetails/' . $data->fee_schedule) ?? '' }}"
                                                                target="_blank">
                                                                <object
                                                                    data="{{ asset('upload/CourseDetails/' . $data->fee_schedule) ?? '' }}"
                                                                    type="application/pdf" width="100" height="100">

                                                                </object>
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>Guidelines(optional)</b> </label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                       <input name="guidelines"
                                                            value="{{ $data->guidelines ?? '' }}" type="file"
                                                            accept="application/pdf" class="form-control"
                                                            placeholder="Title">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        @if ($data != 'null')
                                                            <a href="{{ asset('upload/CourseDetails/' . $data->guidelines ?? '') }}"
                                                                target="_blank">
                                                                <object
                                                                    data="{{ asset('upload/CourseDetails/' . $data->guidelines) ?? '' }}"
                                                                    type="application/pdf" width="100" height="100">

                                                                </object></a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group col-sm-4">
                                                <label for="" class="text-dark"> <b>Status</b> </label>
                                                <select required name="is_deleted" type="text" class="form-control"
                                                    placeholder="Title">
                                                    <option value="1">Active</option>

                                                    <option value="0">Deactive</option>

                                                </select>
                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="" class="text-dark"> <b>About of Course</b> </label>
                                                <textarea required name="about" id="about" class="form-control ckeditor"
                                                    placeholder="About of Course"> {{ $data->about ?? '' }}</textarea>

                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="" class="text-dark"> <b>Course Fee / Eligibility</b>
                                                </label>
                                                <textarea required name="fee" id="fee" class="form-control ckeditor"
                                                    placeholder="fee">{{ $data->fee ?? '' }}</textarea>

                                            </div>
                                            <div  class="form-group col-sm-12">
                                                <label for="" class="text-dark"> <b>Course Offered / Career</b>
                                                </label>
                                                <textarea required name="offered" id="offered" class="form-control ckeditor"
                                                    placeholder="offered">{{ $data->offered ?? '' }}</textarea>

                                            </div>
                                            <div class="form-group col-sm-12">
                                                <label for="" class="text-dark"> <b>Apply Online Instruction</b>
                                                </label>
                                                <textarea required name="apply" id="apply" class="form-control ckeditor"
                                                    placeholder="apply">{{ $data->apply ?? '' }}</textarea>

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
