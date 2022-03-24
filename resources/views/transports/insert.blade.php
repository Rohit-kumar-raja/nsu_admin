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
                <form action="{{ route('transports.insert') }}" method="POST">
                    <div class="container">
                        <div class="row">
                            @csrf

                            <div class="form-group col-sm-4">
                                <?php         $transports=DB::table('routes')->get();
                                ?>
                                <label for="" class="text-dark"> <b>Choose Bus</b> </label>
                                <select required name="bus_id" type="text" class="form-control" placeholder="Title">
                                    <option selected disabled>Choose..</option>
                                    @foreach ($transports as $transport )
                                    <option value="{{ $transport->id }}">{{ $transport->name }} - {{ $transport->bus_no }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Stop</b> </label>
                                <input required name="stop" placeholder="Enter Bus stop name" type="text" class="form-control">
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Timing</b> </label>
                                <input required name="time" placeholder="Enter  bus timing" type="time" class="form-control">
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