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
                <form action="{{ route('events.insert') }}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            @csrf

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Event Name</b> </label>
                                <input required name="name" type="text" class="form-control" placeholder="Name of the event ex- Admission Fair Spring">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Location Name</b> </label>
                                <input required name="title" type="text" class="form-control" placeholder="Ex :- Jamshedpur">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Image</b> </label>
                                <input required name="images" type="file" class="form-control" placeholder="image">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Start time</b> </label>
                                <input required name="start" type="time" class="form-control"
                                    placeholder="Start date	">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>End time</b> </label>
                                <input required name="end" type="time" class="form-control" placeholder="end Date	">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Date</b> </label>
                                <input required name="timing" type="date" class="form-control" placeholder="end Date	">

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
                                <textarea required name="descrption" type="text" class="form-control"
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
