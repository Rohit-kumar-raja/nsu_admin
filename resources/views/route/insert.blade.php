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
                <form action="{{ route('route.insert') }}" method="POST">
                    <div class="container">
                        <div class="row">
                            @csrf
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Name</b> </label>
                                <input required name="name" placeholder="Enter name of Bus" type="text" class="form-control">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>From</b> </label>
                                <input required name="from" placeholder="From"  type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>To</b> </label>
                                <input required name="to" placeholder="To" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Via</b> </label>
                                <input required name="via" placeholder="Via" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Bus No</b> </label>
                                <input required name="bus_no" placeholder="Bus no" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>type</b> </label>
                                <select required name="type" type="text" class="form-control">
                                    <option selected disabled >-Select-</option>
                                    <option value="Boys">Boys</option>
                                    <option value="Girls">Girls</option>
                                    <option value="Both">Both</option>
                                    <option value="none">None</option>

                                </select>

                            </div>
                            <div class="form-group col-sm-4">
                                <?php         $categories=DB::table('course_tbl')->get();
                                ?>
                                <label for="" class="text-dark"> <b>Department</b> </label>
                                <select required name="department" type="text" class="form-control" placeholder="Title">
                                    <option>Choose..</option>
                                    @foreach ($categories as $categorie )
                                    <option value="{{ $categorie->course }}">{{ $categorie->course }}</option>
                                    @endforeach

                                </select>
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