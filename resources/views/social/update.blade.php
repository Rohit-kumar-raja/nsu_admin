<x-layout>
    @slot('title', 'social')
    @slot('body')


        <!-- Page Wrapper -->
        <div id="wrapper">

            @include('include.aside')
            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    @include('include.navbar')
                    <!-- End of Topbar -->
                    {{-- adding the model --}}

                    <!-- Begin Page Content -->
                    <div class="container-fluid">


                        <!-- Page Heading -->
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h2>Update</h2>
                                    </div>
                                    <div class="col-sm-6">
                                        <ol class="breadcrumb float-sm-right">
                                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                                            <li class="breadcrumb-item active">Update</li>
                                        </ol>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Update </h6>
                                </div>

                            </div>
                            @if (session('store'))
                                <div class="alert alert-success">
                                    {{ session('store') }}
                                </div>
                            @endif
                            @if (session('delete'))
                                <div class="alert alert-danger">
                                    {{ session('delete') }}
                                </div>
                            @endif
                            @if (session('update'))
                                <div class="alert alert-success">
                                    {{ session('update') }}
                                </div>
                            @endif
                            @if (session('status'))
                                <div class="alert alert-secondary">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session('status1'))
                                <div class="alert alert-success">
                                    {{ session('status1') }}
                                </div>
                            @endif
                            <div class="card-body">
                                <div class="container">
                                    <form action="{{ route('social.update', $data->id) }}" method="POST">
                                        <div class="row">
                                            @csrf


                                            <input required name="updated_at" value="{{ date('Y-m-d h:m:s') }}"
                                                type="hidden" class="form-control">

                                            <input required name="id" value="{{ $data->id }}" type="hidden"
                                                class="form-control">

                                            <div class="form-group col-sm-6">
                                                <label for="" class="text-dark"> <b>Social Name</b> </label>
                                                <select required name="social" type="text"
                                                    class="form-control text-capitalize">
                                                    <option value="{{ $data->social }}">{{ $data->social }}</option>
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
                                                <input required name="link" value="{{ $data->link }}" type="text"
                                                    placeholder="Enter social media link" class="form-control">

                                            </div>
                                            <div class="form-group col-sm-6">
                                                <label for="" class="text-dark"> <b>status</b> </label>
                                                <select required name="status" type="text" class="form-control">
                                                    <option value="1">Active</option>

                                                    <option value="0">Deactive</option>

                                                </select>
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
                    <!-- /.container-fluid -->

                </div>

            </div>

        </div>
        <!-- Scroll to Top Button-->



    @endslot
</x-layout>
