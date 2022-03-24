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
                <form action="{{ route('teacher.insert') }}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            @csrf
                            <div class="form-group col-sm-4">

                                <label for="" class="text-dark"> <b>Type</b> </label>
                                <select required name="type" type="text" class="form-control" placeholder="Title">
                                    <option>Choose.. </option>
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
                                <select required name="department" type="text" class="form-control" placeholder="Title">
                                    <option>Choose..</option>
                                    @foreach ($categories as $categorie )
                                    <option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Name</b> </label>
                                <input required name="name" type="text" class="form-control" placeholder="Name">

                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b> Designation </b> </label>
                                <input required name="designation" type="text" class="form-control"
                                    placeholder="Designation	">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b> Email Id </b> </label>
                                <input required name="emailid" type="text" class="form-control"
                                    placeholder=" Email Id	">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b> Phone number </b> </label>
                                <input  name="phone" type="text" maxlength="12" class="form-control"
                                    placeholder=" Phone number	">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b> Images </b> </label>
                                <input required name="image_name" accept="image/*" type="file" class="form-control"
                                    placeholder="Images	">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b> Resume </b> </label>
                                <input required name="resume" accept="application/pdf" type="file" class="form-control"
                                    placeholder="Images	">

                            </div>



                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>status</b> </label>
                                <select required name="is_deleted" type="text" class="form-control" placeholder="Title">
                                    <option value="1">Active</option>

                                    <option value="0">Deactive</option>

                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="" class="text-dark"> <b>Description</b> </label>
                                <textarea required name="description" type="text" class="form-control ckeditor"
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