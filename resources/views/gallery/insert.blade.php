<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h5 class="modal-title text-dark " id="exampleModalLongTitle">gallery Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('gallery.insert')}}" method="POST" enctype="multipart/form-data">
                    <div class="container">
                        <div class="row">
                            @csrf

                            <div class="form-group col-sm-4">
                                <?php         $categories=DB::table('album_tbl')->get();
                                ?>
                                <label for="" class="text-dark"> <b>Album</b> </label>
                                <select required name="title" type="text" class="form-control" placeholder="Title">
                                    <option>Choose..</option>
                                    @foreach ($categories as $categorie )
                                    <option value="{{ $categorie->name }}">{{ $categorie->name }}</option>
                                    @endforeach

                                </select>
                            </div>
         
                                <input required name="album_id" value="1"  type="hidden" class="form-control" placeholder="Title">

                  
           
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>image_name</b> </label>
                                <input required name="image_name" type="file" class="form-control"
                                    placeholder="image_name">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Video Link</b> </label>
                                <input required name="link" type="text" class="form-control"
                                    placeholder=" Vieos Link	">

                            </div>

                            <input  type="hidden" name="date" value="{{ date('Y-m-d') }}" id="">

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