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
                <form action="{{ route('header.insert') }}" method="POST">
                    <div class="container">
                        <div class="row">
                            @csrf
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Title </b> </label>
                                <input required name="name" placeholder="Enter title ex - Start career " type="text"
                                    class="form-control">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Name</b> </label>
                                <input name="designation" placeholder="Enter name " type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Url</b> </label>
                                <input name="address" placeholder="Enter url of the name" type="text"
                                    class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Priority</b> </label>
                                <select name="prarirty" placeholder="Enter url of the name" class="form-control">
                                   <option selected disabled >-Select-</option>
                                    @for($i=1; $i < 11; $i++)
                                     <option value="{{ $i }}"> {{ $i }}</option>
                                     @endfor </select>

                            </div>

                            <div class="form-group col-sm-4">
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