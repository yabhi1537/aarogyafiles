<?php
use Illuminate\Pagination\Paginator;
use App\Models\HeaderFooterSetting; 
use App\Models\Setting;
use App\Models\Service;
use App\Models\Menu;
use App\Models\Blog;


$headerData = HeaderFooterSetting::where(['language_id' => '1'])->get();
$SettingData = Setting::where(['language_id' => '1'])->get();
$serviceData = Service::where(['language_id' => '1'])->paginate(6);
$serviceAll = Service::where(['language_id' => '1'])->get();
$blogAll = Blog::all();
 
//  print_r();
//  print_r($SettingData[0]->photo['file']);
?>

<!doctype html>
<html lang="zxx">
<head>
    <?php
    $meta = Menu::where(['language_id' => '1'])->get();
    foreach($meta as $key => $value){
        $pth = Request::path();
        if($value->link == $pth){
            ?>
            <meta name="title" content="{{$value->meta_title}}">
            <meta name="description" content="{{$value->meta_description}}">
            <?php
        }
    }
    ?>
    
    <?php
    foreach($serviceAll as $key => $serValue){
        $blogslug = str_replace(" ","-",$serValue->button_link);
        $pth = Request::path();
        if("services/".$blogslug == $pth){
            ?>
            <meta name="keyword" content="{{$serValue->keywords}}">
            <meta name="description" content="{{$serValue->meta_description}}">
            <meta name="keyword" content="{{$serValue->keywords}}">
            <?php
        }
    }
    ?>
    
    <?php
    foreach($blogAll as $key => $blogValue){
        $blogslug = str_replace(" ","-",$blogValue->slug);
        $pth = Request::path();
   
        if("blog/".$blogslug == $pth){
            ?>
            <meta name="title" content="{{$blogValue->meta_title}}">
            <meta name="description" content="{{$blogValue->meta_description}}">
            <meta name="keyword" content="{{$blogValue->keywords}}">
            <?php
        }
    }
    ?>
    <meta charset="utf-8">
    <!--<meta name="csrf-token" content="@csrf" />-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/boxicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/flaticon-two.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/odometer.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/nice-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/countrySelect.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <title>{{$SettingData[0]->title}}</title>
    <link rel="icon" type="image/png" href="{{asset('assets/images/logo3.png')}}">
</head>

<body>

    <div class="preloader">
        <div class="loader">
            <div class="sbl-half-circle-spin"></div>
        </div>
    </div>


    <header class="header-area hospital-header">

        <div class="top-area hospital-top-area">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-12">
                        <ul class="top-optional-wrap">
                            
                            <li>
                                <a href="{{$headerData[0]->facebook}}" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{$headerData[0]->twiter}}" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <!--<li>-->
                            <!--    <a href="{{$headerData[0]->linkdin}}" target="_blank">-->
                            <!--        <i class='bx bxl-linkedin'></i>-->
                            <!--    </a>-->
                            <!--</li>-->
                            <li>
                                <a href="{{$headerData[0]->instagram}}" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <ul class="top-information-wrap">
                            <li>
                                <i class='bx bxs-phone'></i>
                                <a href="tel:{{$headerData[0]->contact}}">{{$headerData[0]->contact}}</a>
                            </li>
                            <li>
                                <i class='bx bx-envelope'></i>
                                <a href="tel:{{$headerData[0]->email}}"><span class="__cf_email__"
                                        data-cfemail="b0d9ded6dff0d7c2d9de9ed3dfdd">{{$headerData[0]->email}}</span></a>
                            </li>
                            <li>
                                <i class='bx bxs-map'></i>{{$headerData[0]->address}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="navbar-area hospital-navbar-area">
            <div class="main-responsive-nav">
                <div class="container">
                    <div class="main-responsive-menu">
                        <div class="logo">
                            <a href="/aarogya">
                                <img src="{{asset('images/media/'.$SettingData[0]->photo['file'])}}" class="main-logo" alt="logo">
                                <img src="{{asset('images/media/'.$SettingData[0]->photo['file'])}}" class="white-logo" alt="logo">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navbar">
                <div class="container-fluid">
                    <nav class="navbar navbar-expand-md navbar-light">
                        <a class="navbar-brand" href="/aarogya"><img src="{{asset('images/media/'.$SettingData[0]->photo['file'])}}" width="70"
                                height="70"></a>
                        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="/aarogya" class="nav-link">
                                        Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        About Us
                                        <i class='bx bx-plus'></i>
                                    </a>
                                    <ul class="dropdown-menu abt_scrl">
                                        <li class="nav-item">
                                            <a href="{{route('about')}}" class="nav-link">About Us</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('about.story')}}" class="nav-link">Awards & Achievements</a>
                                        </li>
                                    </ul>
                                </li>
                                <!--<li class="nav-item">-->
                                <!--    <a href="{{route('about')}}" class="nav-link">-->
                                <!--        About Us</a>-->
                                <!--</li>-->
                                        <?php
                                        foreach($serviceData as $key => $value){
                                           $serviceslug = str_replace(" ","-",$value->button_link);
                                        ?>
                                        <li class="nav-item">
                                            <a href="{{ route('services', $serviceslug)}}" class="nav-link">
                                            <?php echo $value->title ?> </a>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                <!--<li class="nav-item">-->
                                <!--    <a href="#" class="nav-link">-->
                                <!--        Kidney</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                <!--    <a href="#" class="nav-link">-->
                                <!--        Coma</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                <!--    <a href="#" class="nav-link">-->
                                <!--        Auto-immune</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                <!--    <a href="#" class="nav-link">-->
                                <!--        Surgical</a>-->
                                <!--</li>-->
                                <!--<li class="nav-item">-->
                                <!--    <a href="#" class="nav-link">-->
                                <!--        Lifestyle problem</a>-->
                                <!--</li>-->

                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Other
                                        <i class='bx bx-plus'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        
                                        <?php
                                        foreach($serviceAll as $key => $value){
                                            $serviceslug = str_replace(" ","-",$value->button_link);
                                        ?>
                                        <li class="nav-item">
                                            <a href="{{ route('services', $serviceslug)}}" class="nav-link"><?php echo $value->title ?></a>
                                        </li>
                                        <?php
                                        }
                                        ?>
                                           <!-- <li class="nav-item">
                                           <a href="{{route('servicesall')}}" class="nav-link">All Service</a>
                                        </li> -->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">Rehatology </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">urology </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">Neurology </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">cardica </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">Skin (dermatology-->
                                        <!--        ) </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">ENT </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">Allergy </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">Vascular </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">Pediatric Problem-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">aucte Diseas </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">Respiratopy </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link"> Covid & post-->
                                        <!--        Covid </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">hepatic & gastro-->
                                        <!--        entro </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">Sexcual and-->
                                        <!--        infertitly </a>-->
                                        <!--</li>-->
                                        <!--<li class="nav-item">-->
                                        <!--    <a href="hospital-services-details.html" class="nav-link">GyneologiestSpinal-->
                                        <!--    </a>-->
                                        <!--</li>-->
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        Gallery
                                        <i class='bx bx-plus'></i>
                                    </a>
                                    <ul class="dropdown-menu abt_scrl">
                                        <li class="nav-item">
                                            <a href="{{route('videos')}}" class="nav-link">Videos</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('galery.images')}}" class="nav-link">Images</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('blog')}}" class="nav-link">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{url('http://localhost/aarogya/services/spinal')}}" class="nav-link">Spinal</a>
                                    </li>
                                <!-- <li class="nav-item">
                                    <a href="{{route('servicesall')}}" class="nav-link">All Service</a>
                                </li> -->
 
                                <li class="nav-item">
                                    <a href="{{route('contact')}}" class="nav-link">Contact Us</a>
                                </li>
                            </ul>
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <div class="search-btn">
                                        <!--<a class="#" href="#searchmodal" data-bs-toggle="modal"-->
                                        <!--    data-bs-target="#searchmodal">-->
                                        <!--    <i class="flaticon-search"></i>-->
                                        <!--</a>-->
                                    </div>
                                </div>
                                <div class="option-item">
                                    <div class="navbar-btn">
                                        <a href="/aarogya/#book-appointment" class="default-btn">Book Appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="others-option-for-responsive">
                <div class="container">
                    <div class="dot-menu">
                        <div class="inner">
                            <div class="circle circle-one"></div>
                            <div class="circle circle-two"></div>
                            <div class="circle circle-three"></div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="option-inner">
                            <div class="others-options d-flex align-items-center">
                                <div class="option-item">
                                    <div class="search-btn">
                                        <a class="#" href="#searchmodal" data-bs-toggle="modal"
                                            data-bs-target="#searchmodal">
                                            <i class="flaticon-search"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="option-item">
                                    <div class="navbar-btn">
                                        <a href="appointment.html" class="default-btn">Book Appointment</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    @yield('content')

    <div class="hospital-footer-area pt-200 ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6">
                    <div class="hospital-footer-widget">
                        <h2>
                            <img src="{{asset('images/media/'.$SettingData[0]->photo['file'])}}">
                        </h2>
                        <p>{{$headerData[0]->footer_heading}}</p>
                        <ul class="share-link">
                            <li>
                                <a href="{{$headerData[0]->facebook}}" target="_blank"><i class='bx bxl-facebook'></i></a>
                            </li>
                            <li>
                                <a href="{{$headerData[0]->twiter}}" target="_blank"><i
                                        class='bx bxl-twitter'></i></a>
                            </li>
                            <!--<li>-->
                            <!--    <a href="{{$headerData[0]->linkdin}}" target="_blank"><i class='bx bxl-linkedin'></i></a>-->
                            <!--</li>-->
                            <li>
                                <a href="{{$headerData[0]->instagram}}" target="_blank"><i
                                        class='bx bxl-instagram'></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="hospital-footer-widget ps-5">
                        <?php echo  $headerData[0]->footer_col2_html2 ?>
                        <!--<h3>Useful Link</h3>-->
                        <!--<ul class="quick-links">-->
                        <!--    <li>-->
                        <!--        <a href="#">Cancer-->
                        <!--        </a>-->
                        <!--    </li>-->
                        <!--    <li>-->
                        <!--        <a href="#">Kidney</a>-->
                        <!--    </li>-->
                        <!--    <li>-->
                        <!--        <a href="#">Coma</a>-->
                        <!--    </li>-->
                        <!--    <li>-->
                        <!--        <a href="#">Auto-immune</a>-->
                        <!--    </li>-->
                        <!--    <li>-->
                        <!--        <a href="#">Surgical</a>-->
                        <!--    </li>-->
                        <!--    <li>-->
                        <!--        <a href="#">Lifestyle problem</a>-->
                        <!--    </li>-->
                        <!--</ul>-->
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="hospital-footer-widget ps-5">
                        <h3>Our Services</h3>
                        <div style="height: 270px; overflow-y: scroll">
                        <ul class="quick-links">
                             <?php
                             
                                        foreach($serviceAll as $key => $value){
                                            $serviceslug = str_replace(" ","-",$value->button_link);
                                        ?>
                                        <li class="nav-item">
                                            <a href="{{ route('services',$serviceslug)}}" class="nav-link"><?php echo $value->title ?></a>
                                        </li>
                                        
                                        <?php
                                        }
                                        ?>
                            
                            

                        </ul>
                        </div>
                    </div>
                </div>
                <style>
                 .hours-list ul li{
                     color:#fff;
                 }   
                </style>
                <div class="col-lg-3 col-sm-6">
                    <div class="hospital-footer-widget ps-5">
                        <!--<h3>Working Days</h3>-->
                        <ul class="hours-list">
                        <?php
                            echo $headerData[0]->footer_col2_html1
                        ?>
                            <!--<li class="d-flex justify-content-between align-items-center">-->
                            <!--    <span>Mon - Tue</span>-->
                            <!--    <span>08:00 AM - 05:00PM</span>-->
                            <!--</li>-->
                            <!--<li class="d-flex justify-content-between align-items-center">-->
                            <!--    <span>Wed - Thu</span>-->
                            <!--    <span>09:00 AM - 06:00PM</span>-->
                            <!--</li>-->
                            <!--<li class="d-flex justify-content-between align-items-center">-->
                            <!--    <span>Fri - Sat</span>-->
                            <!--    <span>10:00 AM - 05:00PM</span>-->
                            <!--</li>-->
                            <!--<li class="d-flex justify-content-between align-items-center">-->
                            <!--    <span>Sunday</span>-->
                            <!--    <span>Emergency Only</span>-->
                            <!--</li>-->
                            <!--<li class="d-flex justify-content-between align-items-center">-->
                            <!--    <span>Personal</span>-->
                            <!--    <span>Mon - 10:00 AM</span>-->
                            <!--</li>-->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="hospital-copyright-area">
            <div class="container">
                <div class="copyright-area-content">
                    <!--<p>-->
                        <?php
                        echo $headerData[0]->footer_copyright 
                        
                        ?>
                    <!--</p>-->
                </div>
            </div>
        </div>
    </div>


    <div class="go-top">
        <i class='bx bx-up-arrow-alt'></i>
    </div>


    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.html"></script>
   <script src="{{asset('assets/js/jquery.min.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>

    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.appear.js')}}"></script>

    <script src="{{asset('assets/js/odometer.min.js')}}"></script>

    <script src="{{asset('assets/js/nice-select.min.js')}}"></script>

    <script src="{{asset('assets/js/countrySelect.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>

    <script src="{{asset('assets/js/jquery.ajaxchimp.min.js')}}"></script>

    <script src="{{asset('assets/js/form-validator.min.js')}}"></script>

    <script src="{{asset('assets/js/contact-form-script.js')}}"></script>

    <script src="{{asset('assets/js/wow.min.js')}}"></script>

    <script src="{{asset('assets/js/main.js')}}"></script>
</body>

<!-- Mirrored from templates.hibootstrap.com/grin/default/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Dec 2022 09:07:19 GMT -->

<!-- Mirrored from atzean.com/Homeopathy/index-8.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 10 Jan 2023 11:28:45 GMT -->

</html>