<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h5 class="modal-title text-dark " id="exampleModalLongTitle">Slider Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('testimonial.insert') }}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            @csrf
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Name</b> </label>
                                <input required name="testimonial_name" type="text" class="form-control"
                                    placeholder="Name">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Course</b> </label>
                                <input required name="testimonial_course" type="text" class="form-control"
                                    placeholder="Course">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Batch</b> </label>
                                <input required name="testimonial_batch" type="text" class="form-control"
                                    placeholder="Batch">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b> Designation </b> </label>
                                <input required name="testimonial_desig" type="text" class="form-control"
                                    placeholder="Designation	">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b> Company </b> </label>
                                <input required name="testimonial_company" type="text" class="form-control"
                                    placeholder="Company	">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b> Images </b> </label>
                                <input required name="testimonial_image" type="file" class="form-control"
                                    placeholder="Images	">

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
