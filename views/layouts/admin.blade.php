<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{asset('css/libs/bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/fontawesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/custom-dashboard.css')}}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('assets/css/boxicons.min.css')}}">
    @yield('styles')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
                <div class="sidebar-brand-text mx-3">
                    <a href="/aarogya">
                        <img src="{{asset('assets/images/logo3.png')}}" class="main-logo" alt="logo" style="width: 60px;margin-top: 13px;">
                    </a>
                </div>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>{{clean( trans('niva-backend.dashboard') , array('Attr.EnableID' => true))}}</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            @php $lang = App\Models\Language::find(1); @endphp

            @if(Auth::user()->role->name == 'administrator')
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="far fa-fw fa-file"></i>
                    <span>{{clean( trans('niva-backend.pages') , array('Attr.EnableID' => true))}}</span>
                </a>
                <div id="collapsePages" class="collapse"  data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('page.index') }}?language=@php echo $lang->code; @endphp">{{clean( trans('niva-backend.all_pages') , array('Attr.EnableID' => true))}}</a>
                        <a class="collapse-item" href="{{ route('page.create') }}?language=@php echo $lang->code; @endphp">{{clean( trans('niva-backend.create_page') , array('Attr.EnableID' => true))}}</a>
                    </div>
                </div>
            </li>
           
             <li class="nav-item">
                <a class="nav-link collapsed" href="/admin" data-toggle="collapse" data-target="#services"
                    aria-expanded="true" aria-controls="services">
                    <i class="far fa-fw fa-file"></i>
                    <span>Manage services</span>
                </a>
                <div id="services" class="collapse"  data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('service.index') }}?language=@php echo $lang->code; @endphp">All services</a>
                        <a class="collapse-item" href="{{route('service.create') . '?language=' . request()->input('language')}}">Add services</a>
                    </div>
                </div>
               
                
            </li>
            
           
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin" data-toggle="collapse" data-target="#collapseBlogs"
                    aria-expanded="true" aria-controls="collapseBlogs">
                    <i class="far fa-fw fa-file"></i>
                    <span>{{clean( trans('niva-backend.blogs') , array('Attr.EnableID' => true))}}</span>
                </a>
                <div id="collapseBlogs" class="collapse"  data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('blog.list') }}?language=@php echo $lang->code; @endphp">{{clean( trans('niva-backend.allblog') , array('Attr.EnableID' => true))}}</a>
                        <a class="collapse-item" href="{{route('add/blog')}}">{{clean( trans('niva-backend.addblog') , array('Attr.EnableID' => true))}}</a>
                    </div>
                </div>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link collapsed" href="/media" data-toggle="collapse" data-target="#collapseMedia"
                    aria-expanded="true" aria-controls="collapseMedia">
                    <i class="fas fa-fw fa-images"></i>
                    <span>{{clean( trans('niva-backend.media') , array('Attr.EnableID' => true))}}</span>
                </a>
                <div id="collapseMedia" class="collapse"  data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('media.index') }}">{{clean( trans('niva-backend.all_media') , array('Attr.EnableID' => true))}}</a>
                        <a class="collapse-item" href="{{ route('media.create') }}">{{clean( trans('niva-backend.upload_image') , array('Attr.EnableID' => true))}}</a>
                    </div>
                </div>
            </li>
            
             <li class="nav-item">
                <a class="nav-link collapsed" href="/galery" data-toggle="collapse" data-target="#collapseGallery"
                    aria-expanded="true" aria-controls="collapseGallery">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Gallery</span>
                </a>
                <div id="collapseGallery" class="collapse"  data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('galery.index') }}">All Galery</a>
                        <a class="collapse-item" href="{{ route('galery.create') }}">Upload Galery</a>
                    </div>
                </div>
            </li>

            @if(Auth::user()->role->name == 'administrator')
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin" data-toggle="collapse" data-target="#collapseUsers"
                    aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-fw fa-user"></i>
                    <span>{{clean( trans('niva-backend.users') , array('Attr.EnableID' => true))}}</span>
                </a>
                <div id="collapseUsers" class="collapse"  data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('users.index') }}">{{clean( trans('niva-backend.all_users') , array('Attr.EnableID' => true))}}</a>
                        <a class="collapse-item" href="{{ route('users.create') }}">{{clean( trans('niva-backend.create_user') , array('Attr.EnableID' => true))}}</a>
                    </div>
                </div>
            </li>
            @endif

           
            @if(Auth::user()->role->name == 'administrator')
             <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin" data-toggle="collapse" data-target="#collapseSEO"
                    aria-expanded="true" aria-controls="collapseSEO">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>{{clean( trans('niva-backend.settings') , array('Attr.EnableID' => true))}}</span>
                </a>
                <div id="collapseSEO" class="collapse"  data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('slider.index') }}?language=@php echo $lang->code; @endphp">Manage slider </a>
                         <a class="collapse-item" href="{{ route('about-setting.edit') }}?language=@php echo $lang->code; @endphp">About Setting</a>
                        <a class="collapse-item" href="{{ route('testimonial.index') }}?language=@php echo $lang->code; @endphp">Manage testimonials</a>
                        <a class="collapse-item" href="{{ route('setting.edit') }}?language=@php echo $lang->code; @endphp">{{clean( trans('niva-backend.title_log_favicon') , array('Attr.EnableID' => true))}}</a>
                        <a class="collapse-item" href="{{ route('menu.index') }}?language=@php echo $lang->code; @endphp">{{clean( trans('niva-backend.main_menu') , array('Attr.EnableID' => true))}}</a>
                        <a class="collapse-item" href="{{ route('headerfooter-setting.edit') }}?language=@php echo $lang->code; @endphp">{{clean( trans('niva-backend.header_and_footer') , array('Attr.EnableID' => true))}}</a>
                        <a class="collapse-item" href="{{ route('language.index') }}">{{clean( trans('niva-backend.all_languages') , array('Attr.EnableID' => true))}}</a>
                    </div>
                </div>
            </li>
            @endif
            
            @if(Auth::user()->role->name == 'administrator')
             <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin" data-toggle="collapse" data-target="#collapseEnquirys"
                    aria-expanded="true" aria-controls="collapseSEO">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Enquirys</span>
                </a>
                <div id="collapseEnquirys" class="collapse"  data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                         <a class="collapse-item" href="{{ route('enquiry.list') }}?language=@php echo $lang->code; @endphp">Enquiry</a>
                        <a class="collapse-item" href="{{ route('appoiment.list') }}?language=@php echo $lang->code; @endphp">Appoinment</a>
                        
                    </div>
                </div>
            </li>
            @endif
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li> <a target="_blank" href="{{ route('home') }}" class="view-website-link d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fab fa-chrome"></i> {{clean( trans('niva-backend.view_website') , array('Attr.EnableID' => true))}}</a></li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @php $user = Auth::user(); @endphp
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle" src="{{ url('images/media/'.$user->photo->file)}}" alt="">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('/admin/users') }}/{{auth()->user()->id}}/edit">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{clean( trans('niva-backend.edit_user') , array('Attr.EnableID' => true))}}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{clean( trans('niva-backend.logout') , array('Attr.EnableID' => true))}}
                                </a>
                               
                            </div>
                        </li>

                    </ul>

                </nav>

                 @yield('content')
 

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{clean( trans('niva-backend.ready_leave') , array('Attr.EnableID' => true))}}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{clean( trans('niva-backend.logout_message') , array('Attr.EnableID' => true))}}</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal" >{{clean( trans('niva-backend.cancel') , array('Attr.EnableID' => true))}}</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{clean( trans('niva-backend.logout') , array('Attr.EnableID' => true))}}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }} </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('js/libs/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/libs/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/libs/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/libs/custom-dashboard.js') }}"></script>



    @yield('footer')
   

    


</body>

</html>
