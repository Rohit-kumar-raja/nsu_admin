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
                <form action="{{ route('social.insert', $id) }}" method="POST">
                    <div class="container">
                        <div class="row">
                            @csrf

                            <div class="form-group col-sm-6">
                                <label for="" class="text-dark"> <b>Teacher Name</b> </label>
                                <input disabled value="{{ $faculty->name }}" type="text" class="form-control">
                                <input required name="teacher_id" value="{{ $id }}" type="hidden"
                                    class="form-control">
                                <input required name="created_at" value="{{ date('Y-m-d h:m:s') }}" type="hidden"
                                    class="form-control">

                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="text-dark"> <b>Social Name</b> </label>
                                <select required name="social" type="text" class="form-control text-capitalize">
                                    <option selected disabled>- Social -</option>
                                    <option value="facebaook">Facebook</option>
                                    <option value="twitter">twitter</option>
                                    <option value="google">google</option>
                                    <option value="linkedin">linkedin</option>
                                    <option value="youtube">youtube</option>
                                    <option value="instagram">instagram</option>
                                    <option value="pinterest">pinterest</option>
                                    <option value="skype">skype</option>
                                    <option value="android">android</option>
                                    <option value="dribbble">dribbble</option>
                                    <option value="vimeo">vimeo</option>
                                    <option value="tumblr">tumblr</option>
                                    <option value="vine">vine</option>
                                    <option value="foursquare">foursquare</option>
                                    <option value="stumbleupon">stumbleupon</option>
                                    <option value="flickr">flickr</option>
                                    <option value="reddit">reddit</option>
                                    <option value="facebaook">Facebook</option>

                                </select>

                            </div>
                            <div class="form-group col-sm-6">
                                <label for="" class="text-dark"> <b>Social Link</b> </label>
                                <input required name="link" type="text" placeholder="Enter social media link"
                                    class="form-control">

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
