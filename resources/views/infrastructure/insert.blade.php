<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h5 class="modal-title text-dark " id="exampleModalLongTitle">Infrastructure</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('infrastructure.insert')}}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            @csrf

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Categories</b> </label>
                                <input readonly  name="page_type" required type="text" value="infrastructure" class="form-control"
                                    placeholder="Title">
                             

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Url Name</b> </label>
                                <input required name="title" type="text" class="form-control" placeholder="Title">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Title</b> </label>
                                <input required name="sub_title" type="text" class="form-control"
                                    placeholder="sub_title">

                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Header Images</b> </label>
                                <input required name="header_image" accept="image/*" type="file" class="form-control"
                                    placeholder="header Images">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Image 1</b> </label>
                                <input required name="image_name" accept="image/*" type="file" class="form-control"
                                    placeholder="image_name">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Image 2</b> </label>
                                <input required name="image_name1" accept="image/*" type="file" class="form-control"
                                    placeholder="image_name1">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Video Link</b> </label>
                                <input required name="permalink" type="text" class="form-control"
                                    placeholder="Video Link">

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