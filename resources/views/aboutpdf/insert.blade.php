<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h5 class="modal-title text-dark " id="exampleModalLongTitle">About Pdf</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('aboutpdf.insert') }}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            @csrf



                            <input name="type" value="aboutpdf" type="hidden" class="form-control">

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Title</b> </label>
                                <input required name="title" type="text" class="form-control" placeholder="Title">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>PDF</b> </label>
                                <input  accept="application/pdf" required name="images" type="file" class="form-control" placeholder="image">

                            </div>

                            <input type="hidden" name="created_at" value="{{ date('Y-m-d') }}">


                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>status</b> </label>
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