<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h5 class="modal-title text-dark " id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="categories" method="POST">
                <div class="container">
                    <div class="row">
                      @csrf
                        <div class="form-group col-sm-6">
                            <label for="" class="text-dark"> <b>Name</b> </label>
                            <input required name="name"  type="text" class="form-control">

                        </div>
                        <div class="form-group col-sm-6">
                            <label for="" class="text-dark"> <b>status</b> </label>
                            <select required name="status" type="text" class="form-control">
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
