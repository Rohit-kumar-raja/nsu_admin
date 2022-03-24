<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h5 class="modal-title text-dark " id="exampleModalLongTitle">Affiliated Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('affiliated.insert') }}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            @csrf
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Url Name</b> </label>
                                <input required name="title" type="text" class="form-control" placeholder="Url name ex- ugc">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Title</b> </label>
                                <input required name="sub_title" type="text" class="form-control"
                                    placeholder="Title of the affliation">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Image </b> </label>
                                <input required name="image_name" type="file" class="form-control"
                                    placeholder="image of affiliation">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Image Link</b> </label>
                                <input required name="virtual_image_name" type="text" class="form-control"
                                    placeholder="link of the image">

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
