<aside>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="align-items-center justify-content-center" href="{{ route('dashboard') }}">

            <div class="text-center">
                <x-application-logo class="" style="width:150px!important;"/> <sup></sup>
            </div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Categories</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('categories') }}">Program</a>
                </div>
            </div>
        </li> --}}
        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsehome"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas  fa-home"></i>
                <span>Home</span>
            </a>
            <div id="collapsehome" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('header') }}">Header</a>
                    <a class="collapse-item" href="{{ route('slider') }}">Slider</a>
                    <a class="collapse-item" href="{{ route('noticeboard') }}">Notice Board</a>

                    <a class="collapse-item" href="{{ route('events') }}"> Events</a>
                    <a class="collapse-item" href="{{ route('testimonial') }}">Testimonial</a>
                    <a class="collapse-item" href="{{ route('latestnews') }}">Latest News</a>
                </div>

            </div>

        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseabout"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-file-alt"></i>
                <span>pages</span>
            </a>
            <div id="collapseabout" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('about') }}">About</a>
                    <a class="collapse-item" href="{{ route('infrastructure') }}">Infrastructure</a>
                    <a class="collapse-item" href="{{ route('admission') }}">Admission</a>
                    <a class="collapse-item" href="{{ route('student') }}"> Student</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsepdf"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-file-alt"></i>
                <span>Pdf</span>
            </a>
            <div id="collapsepdf" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('studentpdf') }}">Student</a>
                    <a class="collapse-item" href="{{ route('aboutpdf') }}">About</a>

                </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsedepartment"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-ethernet"></i>
                <span>Department</span>
            </a>
            <div id="collapsedepartment" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('program') }}">Program</a>

                    <a class="collapse-item" href="{{ route('department') }}">Department</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseapp"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-mail-bulk"></i>
                <span>Placement</span>
            </a>
            <div id="collapseapp" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('placement') }}">Placement</a>
                    <a class="collapse-item" href="{{ route('appointment') }}">Appointment</a>
                    <a class="collapse-item" href="{{ route('recruiters') }}">Recruiters</a>
                    <a class="collapse-item" href="{{ route('placement.contact') }}">Placement Contact</a>


                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseuniversity"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-building"></i>
                <span>University</span>
            </a>
            <div id="collapseuniversity" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('teacher') }}">Teachers</a>
                    <a class="collapse-item" href="{{ route('affiliated') }}">Affiliated</a>
                    <a class="collapse-item" href="{{ route('govbody') }}">Goverment body</a>

                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsegallery"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-images"></i>
                <span>Gallery</span>
            </a>
            <div id="collapsegallery" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('album') }}">Album</a>

                    <a class="collapse-item" href="{{ route('gallery') }}">University Gallery</a>
                    <a class="collapse-item" href="{{ route('mediagallery') }}">Media Gallery</a>

                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetransport"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-images"></i>
                <span>Transport</span>
            </a>
            <div id="collapsetransport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('route') }}">Route </a>
                    <a class="collapse-item" href="{{ route('transports') }}">Transport </a>

                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsecareer"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-user"></i>
                <span>Career</span>
            </a>
            <div id="collapsecareer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('career') }}">Add Career</a>

                    <a class="collapse-item" href="{{ route('career.applied') }}"> Career Data </a>

                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('seo') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>SEO</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">






    </ul>

</aside>