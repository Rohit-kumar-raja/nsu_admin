<x-layout>
    @slot('title', 'table')
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
                        <div class="card-body">
                            <form action="{{ route('seo.update') }}" method="POST">
                                <div class="container">
                                    <div class="row">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $data->id }}" id="">
                                        <div class="form-group col-sm-4">
                                            <?php         $pages=DB::table('pages')->get();
                                            ?>
                                            <label for="" class="text-dark"> <b>Page Name</b> </label>
                                            <select required name="page_id" type="text" class="form-control"
                                                placeholder="Title">
                                                <option value="{{ $data->id }}">{{ $data->title }}</option>

                                                @foreach ($pages as $page )
                                                <option value="{{ $page->id }}">{{ $page->title }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>title</b> </label>
                                            <input value="{{ $data->title  }}" required name="title" type="text"
                                                class="form-control">

                                        </div>


                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Robots1</b> </label>
                                            <input value="{{ $data->Robots1  }}" required name="Robots1" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Robots2</b> </label>
                                            <input value="{{ $data->Robots2  }}" required name="Robots2" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>googlebot</b> </label>
                                            <input value="{{ $data->googlebot  }}" required name="googlebot" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Robots3</b> </label>
                                            <input value="{{ $data->Robots3  }}" required name="Robots3" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>revisit-after </b> </label>
                                            <input value="{{ $data->revisit  }}" required name="revisit" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>author</b> </label>
                                            <input value="{{ $data->author  }}" required name="author" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>subject</b> </label>
                                            <input value="{{ $data->subject  }}" required name="subject" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>url</b> </label>
                                            <input value="{{ $data->url  }}" required name="url" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>identifier-URL </b> </label>
                                            <input value="{{ $data->identifier_URL  }}" required name="identifier_URL"
                                                type="text" class="form-control">

                                        </div>

                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>msnbot</b> </label>
                                            <input value="{{ $data->msnbot  }}" required name="msnbot" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>Slurp </b> </label>
                                            <input value="{{ $data->Slurp  }}" required name="Slurp" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>directory</b> </label>
                                            <input value="{{ $data->directory  }}" required name="directory" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>language</b> </label>
                                            <input value="{{ $data->language  }}" required name="language" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>distribution</b> </label>
                                            <input value="{{ $data->distribution  }}" required name="distribution"
                                                type="text" class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>coverage</b> </label>
                                            <input value="{{ $data->coverage  }}" required name="coverage" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>copyright</b> </label>
                                            <input value="{{ $data->copyright  }}" required name="copyright" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>rating</b> </label>
                                            <input value="{{ $data->rating  }}" required name="rating" type="text"
                                                class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>classification</b> </label>
                                            <input value="{{ $data->classification  }}" required name="classification"
                                                type="text" class="form-control">

                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>canonical</b> </label>
                                            <input value="{{ $data->canonical }}" required name="canonical" type="text"
                                                class="form-control">

                                        </div>
                                        <input name="updated_at" type="hidden" value="{{ date('Y-m-d') }}"
                                            class="form-control">


                                        <div class="form-group col-sm-4">
                                            <label for="" class="text-dark"> <b>status</b> </label>
                                            <select required name="is_deleted" type="text" class="form-control">
                                                <option value="1">Active</option>

                                                <option value="0">Deactive</option>

                                            </select>
                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="" class="text-dark"> <b>keywords</b> </label>
                                            <textarea name="keywords" id="description" class="form-control"
                                                placeholder="description">{{ $data->keywords }}</textarea>

                                        </div>
                                        <div class="form-group col-sm-12">
                                            <label for="" class="text-dark"> <b>Description</b> </label>
                                            <textarea name="description" id="description" class="form-control"
                                                placeholder="description">{{ $data->description }}</textarea>

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
                <!-- /.container-fluid -->

            </div>

        </div>

    </div>
    <!-- Scroll to Top Button-->



    @endslot
</x-layout>