<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h5 class="modal-title text-dark " id="exampleModalLongTitle">Appointment Letter</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('appointment.insert')}}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            @csrf

                            <div class="form-group col-sm-4">
                                <?php         $categories=DB::table('course_tbl')->get();
                                ?>
                                <label for="" class="text-dark"> <b>Course</b> </label>
                                <select required name="course" type="text" class="form-control" placeholder="Title">
                                    @foreach ($categories as $categorie )
                                    <option value="{{ $categorie->course }}">{{ $categorie->course }}</option>
                                    @endforeach

                                </select>
                            </div>
                          
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Student Name</b> </label>
                                <input required name="title" type="text" class="form-control" placeholder="Student Name">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Company Name (Post)</b> </label>
                                <input required name="sub_title" type="text" class="form-control"
                                    placeholder="Company name and post">

                            </div>

         
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Student Image</b> </label>
                                <input required name="image_name" accept="image/*" type="file" class="form-control"
                                    placeholder="image_name">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b> Appointment Image 1 </b> </label>
                                <input required name="image_name1" accept="image/*" type="file" class="form-control"
                                    placeholder="Appointment Letter Image ">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b> Appointment Letter (in <i class="fas fa-file-pdf  text-danger" aria-hidden="true"></i>)</b> </label>
                                <input required name="image_name2" accept="application/pdf" type="file" class="form-control"
                                    placeholder="Appointment Letter Image ">

                            </div>


                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Status</b> </label>
                                <select required name="is_deleted" type="text" class="form-control" placeholder="Title">
                                    <option value="1">Active</option>

                                    <option value="0">Deactive</option>

                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="" class="text-dark"> <b>Description</b> </label>
                                <textarea required name="description" type="text" class="ckeditor form-control"
                                    placeholder="description"></textarea>

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
</div>