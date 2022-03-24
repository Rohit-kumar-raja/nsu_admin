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
                <form action="{{ route('department.insert') }}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            @csrf
                            <div class="form-group col-sm-4">
                                <?php         $categories=DB::table('categorie')->get();
                                ?>
                                <label for="" class="text-dark"> <b>Program</b> </label>
                                <select required name="program" type="text" class="form-control" placeholder="Title">
                                    @foreach ($categories as $categorie )
                                    <option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Course Name</b> </label>
                                <input required name="course" type="text" class="form-control" placeholder="name">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Full Form</b> </label>
                                <input  name="fullform" type="text" class="form-control" placeholder="Full form of the course ">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b> Banner Image </b> </label>
                                <input required name="images" type="file" class="form-control" placeholder="image">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Fee</b> </label>
                                <input required name="fee" type="text" class="form-control" placeholder=" Fee ">

                            </div>



                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Status</b> </label>
                                <select required name="is_deleted" type="text" class="form-control" placeholder="Title">
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
</div>