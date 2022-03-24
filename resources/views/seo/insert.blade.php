<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-header text-center">
                <h5 class="modal-title text-dark " id="exampleModalLongTitle">SEO DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('seo.insert') }}" method="POST">
                    <div class="container">
                        <div class="row">
                            @csrf

                            <div class="form-group col-sm-4">
                                <?php         $pages=DB::table('pages')->get();
                                ?>
                                <label for="" class="text-dark"> <b>Page Name</b> </label>
                                <select required name="page_id" type="text" class="form-control" placeholder="Title">
                                    @foreach ($pages as $page )
                                    <option value="{{ $page->id }}">{{ $page->title }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>title</b> </label>
                                <input required name="title" type="text" class="form-control">

                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>keywords</b> </label>
                                <input required name="keywords" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Robots1</b> </label>
                                <input required name="Robots1" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Robots2</b> </label>
                                <input required name="Robots2" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>googlebot</b> </label>
                                <input required name="googlebot" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Robots3</b> </label>
                                <input required name="Robots3" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>revisit-after </b> </label>
                                <input required name="revisit" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>author</b> </label>
                                <input required name="author" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>subject</b> </label>
                                <input required name="subject" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>url</b> </label>
                                <input required name="url" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>identifier-URL </b> </label>
                                <input required name="identifier_URL" type="text" class="form-control">

                            </div>

                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>msnbot</b> </label>
                                <input required name="msnbot" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>Slurp </b> </label>
                                <input required name="Slurp" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>directory</b> </label>
                                <input required name="directory" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>language</b> </label>
                                <input required name="language" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>distribution</b> </label>
                                <input required name="distribution" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>coverage</b> </label>
                                <input required name="coverage" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>copyright</b> </label>
                                <input required name="copyright" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>rating</b> </label>
                                <input required name="rating" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>classification</b> </label>
                                <input required name="classification" type="text" class="form-control">

                            </div>
                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>canonical</b> </label>
                                <input required name="canonical" type="text" class="form-control">

                            </div>
                            <input name="created_at" type="hidden" value="{{ date('Y-m-d') }}" class="form-control">


                            <div class="form-group col-sm-4">
                                <label for="" class="text-dark"> <b>status</b> </label>
                                <select required name="is_deleted" type="text" class="form-control">
                                    <option value="1">Active</option>

                                    <option value="0">Deactive</option>

                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="" class="text-dark"> <b>keywords</b> </label>
                                <textarea name="keywords" id="keywords" class="form-control"
                                    placeholder="keywords"></textarea>

                            </div>
                            <div class="form-group col-sm-12">
                                <label for="" class="text-dark"> <b>Description</b> </label>
                                <textarea name="description" id="description" class="form-control"
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