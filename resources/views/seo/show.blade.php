<x-layout>
    @slot('title', 'seo')
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
                @include('seo.insert')
                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <div class="py-12">

                        <div class="card p-4">
                            <div class="">
                                <a href="{{ route('seo') }}" class=" btn btn-secondary btn-sm ">Back</a>
                            </div>
                            <br>
                            <br>
                            <div class="container">
                                <div class="row">

                                    <?php         $pages=DB::table('pages')->find($data->page_id);
                                    ?>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> Page Name : </b>
                                            <p class="col-sm-8"> {{ $pages->title }}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> Page Type : </b>
                                            <p class="col-sm-8"> {{ $pages->page_type}}</p>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> Title : </b>
                                            <p class="col-sm-8"> {{ $data->title}}</p>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> description : </b>
                                            <p class="col-sm-8"> {{ $data->description}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> Robots1 : </b>
                                            <p class="col-sm-8"> {{ $data->Robots1}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> Robots2 : </b>
                                            <p class="col-sm-8"> {{ $data->Robots2}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> googlebot : </b>
                                            <p class="col-sm-8"> {{ $data->googlebot}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> Robots3 : </b>
                                            <p class="col-sm-8"> {{ $data->Robots3}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> revisit-after : </b>
                                            <p class="col-sm-8"> {{ $data->revisit}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> author : </b>
                                            <p class="col-sm-8"> {{ $data->author}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> subject : </b>
                                            <p class="col-sm-8"> {{ $data->subject}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> identifier_URL : </b>
                                            <p class="col-sm-8"> {{ $data->identifier_URL}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> msnbot : </b>
                                            <p class="col-sm-8"> {{ $data->msnbot}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> Slurp : </b>
                                            <p class="col-sm-8"> {{ $data->Slurp}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> directory : </b>
                                            <p class="col-sm-8"> {{ $data->directory}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> language : </b>
                                            <p class="col-sm-8"> {{ $data->language}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> distribution : </b>
                                            <p class="col-sm-8"> {{ $data->distribution}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> coverage : </b>
                                            <p class="col-sm-8"> {{ $data->coverage}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> copyright : </b>
                                            <p class="col-sm-8"> {{ $data->copyright}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> rating : </b>
                                            <p class="col-sm-8"> {{ $data->rating}}</p>
                                        </div>
                                    </div>






                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> classification : </b>
                                            <p class="col-sm-8"> {{ $data->classification}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> canonical : </b>
                                            <p class="col-sm-8"> {{ $data->canonical}}</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <b class="col-sm-4"> keywords : </b>
                                            <p class="col-sm-8"> {{ $data->keywords}}</p>
                                        </div>
                                    </div>



                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endslot
</x-layout>