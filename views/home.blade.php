@extends('layouts.front')
@section('title') {{$homesetting->meta_title}} @endsection
@section('meta') {{$homesetting->meta_description}} @endsection
@section('content')
<style>
   .hospital-services-card p {
   overflow: hidden;
   display: -webkit-box;
   text-align:center;
   -webkit-line-clamp: 3;
   -webkit-box-orient: vertical;
   }
   .hospital-footer-area {
   padding-top: 250px;
   }
</style>
<div class="modal fade fade-scale searchmodal covid-searchmodal" id="searchmodal" tabindex="-1" role="dialog">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-bs-dismiss="modal">
            <i class='bx bx-x'></i>
            </button>
         </div>
         <div class="modal-body">
            <form class="modal-search-form">
               <input type="search" class="search-field" placeholder="Search...">
               <button type="submit"><i class='bx bx-search-alt'></i></button>
            </form>
         </div>
      </div>
   </div>
</div>
<!--<div class="hospital-banner-area">-->
<div class="home-slides owl-carousel owl-theme" style="height: 550px;">
   <?php
      foreach($sliders as $key => $value){
          ?>
   <div class="main-slides-item item-bg4" style='background-image: url({{asset("images/media/".$value->file)}})'>
      <div class="container">
         <div class="main-slides-content">
            <?php echo $value->heading1 ?>
             <?php echo $value->heading2 ?> 
         
            <div class="slides-btn">
                <a href="{{route('contact')}}" class="default-btn">Contact-Us</a>
               <!--<a href="{{$value->button_link}}" class="default-btn mt-5">{{$value->button_text}}</a>-->
            </div>
         </div>
      </div>
   </div>
   <?php
      }
      
      ?>
</div>
<!--</div>-->
<div class="hospital-about-shape">
   <img src="assets/images/hospital/about-shape.png" alt="image">
</div>
</div>
<div class="hospital-about-area ptb-100">
   <div class="container">
      <div class="row justify-content-center align-items-center">
         <div class="col-lg-6 col-md-12">
            <div class="hospital-about-image">
               <!-- <img src="{{asset('images/media/'.$aboutsetting['photo']->file)}}" alt="<?php echo $aboutsetting['photo']->alttag ?>"> -->
               <img src="images/media/1684848174Dr. Arpit Chopda.png" alt="">

            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="hospital-about-content">
               <?php
                  echo $aboutsetting['about_description'];
                  ?>
               <div class="mt-4">
                  <p>
                     Your one stop solution for health complaints that need homeopathy.
                      Aarogya Super Speciality Clinic is on Online & Offline homeopathy consultation source that you can avail from your comfort zone.  
                  </p>
               </div>
               <div class="about-btn">
                  <div>
                     <a href="{{route('about')}}" class="default-btn">Learn More</a>
                  </div>
                  <!--<div class="m-1">-->
                  <!--    <a href="#" class="default-btn">Learn More</a>-->
                  <!--</div>-->
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="hospital-about-shape">
      <img src="assets/images/hospital/about-shape.png" alt="image">
   </div>
</div>
<div id='book-appointment' class="hospital-appointment-area ptb-100">
   <div class="container">
      <div class="section-title with-hospital-color">
         <span>Appointment</span>
         <h2>Request An Appointment</h2>
      </div>
      <div class="hospital-appointment-form">
         <form action='{{route("book.appointment")}}' method='post' enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
               <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                     <input type="text" name='name' class="form-control" placeholder="Name">
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                  <input type="text" name='phone' class="form-control" placeholder="Phone">
                     
                  </div>
               </div>
            </div>
            <div class="row justify-content-center">
               <!-- <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                  <input type="text" name='email' class="form-control" placeholder="Email">
                  </div>
               </div> -->
               <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                  <input type="file" name='reports' class="form-control" placeholder="Add Reports">
                  </div>
               </div>
            
               <div class="col-lg-4 col-md-6">
                  <div class="form-group">
                     <select name='sirvice_id'>
                        <option value="1">Select Service</option>
                        <?php
                           foreach($service as $key => $value){
                               ?>
                        <option value="{{$value->id}}">{{$value->title}}</option>
                        <?php
                           }
                           ?>
                     </select>
                  </div>
               </div>
               </div>
            <div class="row justify-content-center">
               <div class="col-lg-8 col-md-6">
                  <div class="form-group">
                     <!--<input type="textarea" class="form-control" placeholder="Message">-->
                     <textarea class="form-control" name='message' rows="4" cols="50" placeholder="Message"></textarea>
                  </div>
               </div>
               <div class="col-lg-6 col-md-12">
                  <button type="submit" class="default-btn">Submit Now</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
</div>
<!--<div class="hospital-services-area pt-100 pb-75">-->
<div class="container pt-50">
   <div class=" with-hospital-color d-flex justify-content-between align-items-center">
      <div class="section-title with-hospital-color">
         <h2>Our Special Services</h2>
      </div>
   </div>
   <!--        <div class="hospital-services-slides owl-carousel owl-theme">-->
   <div class='row mt-5'>
      <?php
       use App\Models\Photo;
         foreach($services as $key => $value){
            $icon  =  Photo::where('id',$value->icon)->get();
             ?> 
      <div class="col-md-4 ">
         <div class='hospital-services-card'>
            <div class="title">

            <img src="{{asset('images/media/'.$icon[0]->file)}}" style="height: 100px;width: 100px;" alt="">

               <!-- <img src="{{'images/media/'.$value->photo['file']}}" style="height: 80px;width: 80px;" alt="{{$value->photo['alttag']}}"> -->
               <h3>
                  <a href="{{ route('services', $value->button_link)}}"><?php echo $value->title ?></a>
               </h3>
            </div>
            <p><?php echo $value->description?></p>
            <a href="{{ route('services', $value->button_link)}}" class="services-btn default-btn"> Read More</a>
         </div>
      </div>
      <?php
         }
         ?>
   </div>
   <!--</div>-->
   <div class="srvc-btn pt-50 pb-50">
      <a href="{{url('http://localhost/aarogya/services')}}" class="default-btn">View All Services</a> 
   </div>
</div>
<!--</div>-->
<div class="members-section">
    <div class=" with-hospital-color d-flex justify-content-between align-items-center">
      <div class="section-title with-hospital-color">
         <h2>Videos</h2>
      </div>
   </div>
   <div class="container">
      <div class="row mb-4">
         <div class="col-lg-4 col-md-6 ">
            <div class="single-services">
               <div class="services-image">
                  <iframe width="100%" height="175px" src="https://www.youtube.com/embed/1T3y92CkXAY" frameborder="0" allowfullscreen></iframe>
               </div>
               <div class="services-content">
                  <p><strong>Mesentric lymphadenopathy in childrens bacterial infection, Allergic inflammatory reactions cured</strong></p>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 ">
            <div class="single-services">
               <div class="services-image">
                  <iframe width="100%" height="175px" src="https://www.youtube.com/embed/yOpno-hihDc" frameborder="0" allowfullscreen></iframe>
               </div>
               <div class="services-content">
                  <p><strong>Ankylosing spondylitis cured fast by Dr Arpit chopra Jain Aarogya Superspeciality modern homeopathy</strong></p>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 ">
            <div class="single-services">
               <div class="services-image">
                  <iframe width="100%" height="175px" src="https://www.youtube.com/embed/7MZXe0S0Uwo" frameborder="0" allowfullscreen></iframe>
               </div>
               <div class="services-content">
                  <p><strong>parkinsonism | Parkinsons Success stories | Parkinson&#39;s Disease Treatment | Dr. Arpit Chopra Jain</strong></p>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 ">
            <div class="single-services">
               <div class="services-image">
                  <iframe width="100%" height="175px" src="https://www.youtube.com/embed/EX57oOfQOvM" frameborder="0" allowfullscreen></iframe>
               </div>
               <div class="services-content">
                  <p><strong>Mesentric lymphadenopathy in childrens bacterial infection, Allergic inflammatory reactions cured</strong></p>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 ">
            <div class="single-services">
               <div class="services-image">
                  <iframe width="100%" height="175px" src="https://www.youtube.com/embed/jR4tSbyLTqo" frameborder="0" allowfullscreen></iframe>
               </div>
               <div class="services-content">
                  <p><strong>Ankylosing spondylitis cured fast by Dr Arpit chopra Jain Aarogya Superspeciality modern homeopathy</strong></p>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6 ">
            <div class="single-services">
               <div class="services-image">
                  <iframe width="100%" height="175px" src="https://www.youtube.com/embed/b6mKt9lEf14" frameborder="0" allowfullscreen></iframe>
               </div>
               <div class="services-content">
                  <p><strong>parkinsonism | Parkinsons Success stories | Parkinson&#39;s Disease Treatment | Dr. Arpit Chopra Jain</strong></p>
               </div>
            </div>
         </div>
        
         <div class="section-title with-hospital-color">
         <a href="{{route('videos')}}" class="default-btn">View All Videos</a>
      </div>
      </div>
   </div>
</div>
<div class="hospital-skills-area ptb-100">
   <div class="container">
      <div class="row justify-content-center align-items-center">
         <div class="col-lg-6 col-md-12">
            <div class="hospital-skills-content">
               <!--<span class="sub-title">Our Story </span>-->
               <h3>Our Story </h3>
               <?php  echo $aboutsetting['member_title_section']; ?>
            </div>
         </div>
         <div class="col-lg-6 col-md-12">
            <div class="hospital-skills-image">
               <img src="{{asset('images/media/'.$aboutsetting['photo_story']->file)}}" alt="{{$aboutsetting['photo_story']->alttag}}">
            </div>
         </div>
      </div>
   </div>
</div>
<section class="hospital-fun-facts-area pt-100 pb-75">
   <div class="container">
      <div class="row">
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="hospital-fun-fact">
               <h3>
                  <span class="odometer" data-count="{{$aboutsetting['about_subtitle']}}">00</span>
               </h3>
               <p>Health Sections</p>
               <div class="shape">
                  <img src="assets/images/hospital/fun-fact/img1.png" alt="image">
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="hospital-fun-fact">
               <h3>
                  <span class="odometer" data-count="{{$aboutsetting['about_title']}}">00</span>
               </h3>
               <p>Professionals Doctor</p>
               <div class="shape">
                  <img src="assets/images/hospital/fun-fact/img2.png" alt="image">
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="hospital-fun-fact">
               <h3>
                  <span class="odometer" data-count="{{$aboutsetting['about_buttontext']}}">00</span>
               </h3>
               <p>Satisfied Patients</p>
               <div class="shape">
                  <img src="assets/images/hospital/fun-fact/img3.png" alt="image">
               </div>
            </div>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="hospital-fun-fact">
               <h3>
                  <span class="odometer" data-count="{{$aboutsetting['about_buttonlink']}}">00</span>
                  <!--<span class="plus">+</span>-->
               </h3>
               <p>Health Plans</p>
               <div class="shape">
                  <img src="assets/images/hospital/fun-fact/img4.png" alt="image">
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<div class="hospital-testimonials-area ptb-50">
   <div class="container">
      <div class="section-title with-hospital-color text-start">
         <span>Testimonials</span>
         <h2>Our Clients Feedback</h2>
      </div>
      <div class="hospital-testimonials-slides owl-carousel owl-theme">
         <?php
            foreach($testimonials as $key => $value){
                ?>
         <div class="hospital-testimonials-card">
            <p>“{{$value->description}}”</p>
            <div class="info-content d-flex justify-content-between align-items-center">
               <div class="info d-flex align-items-center">
                  <img src="assets/images/user.png" class="rounded-circle" alt="image">
                  <div class="title">
                     <h3>{{$value->name}}</h3>
                     <!--<span>SEO - Founder</span>-->
                  </div>
               </div>
               <ul class="rating">
                  <li>
                     <i class='bx bxs-star'></i>
                  </li>
                  <li>
                     <i class='bx bxs-star'></i>
                  </li>
                  <li>
                     <i class='bx bxs-star'></i>
                  </li>
                  <li>
                     <i class='bx bxs-star'></i>
                  </li>
                  <li>
                     <i class='bx bxs-star'></i>
                  </li>
               </ul>
            </div>
         </div>
         <?php
            }
            ?>
       
      </div>
   </div>
</div>
<div class="hospital-blog-area ptb-50">
   <div class="container">
      <div class="section-title with-hospital-color">
         <span>Our Blog</span>
         <h2>Recent Articles And News</h2>
      </div>
      <style>
         .blog-content p {
         overflow: hidden;
         display: -webkit-box;
         -webkit-line-clamp: 2;
         -webkit-box-orient: vertical;
         }
         .blog-content h3 a {
         overflow: hidden;
         display: -webkit-box;
         -webkit-line-clamp: 1;
         -webkit-box-orient: vertical;
         }
      </style>
      <div class="row justify-content-center">
         <?php
            foreach($blog as $key => $value){
                 $blogslug = str_replace(" ","-",$value->slug);
                ?>
         <div class="col-lg-4 col-md-6">
            <div class="single-blog">
               <div class="blog-image">
                  <a href="{{ route('blog-details', $blogslug) }}">
                  <?php
                     if ( strstr( $value->image_name, 'https://' ) ) {
                         ?>
                  <img src="{{$value->image_name}}" alt="{{$value->alt}}"></a>
                  <?php
                     // echo "Text found";
                     } else {
                     ?>
                  <img src="{{$value->image_name}}" alt="{{$value->alt}}"></a>
                  <?php
                     // echo "Text not found";
                     }
                     
                     ?>
                  <?php
                     $newDate = date('d M', strtotime($value->created_at));
                     ?>
                  <div class="tag">{{$newDate}}</div>
               </div>
               <div class="blog-content">
                  <h3>
                     <a href="{{ route('blog-details', $blogslug) }}">{{$value->heading}}</a>
                  </h3>
                  <p>{{$value->discription}}</p>
                  <a href="{{ route('blog-details', $blogslug) }}" style='color:#06a3da;'
                     class="tag default-btn">Read More</a>
                    <ul class="entry-meta">
                    </ul>
               </div>
            </div>
         </div>
         <?php
            }
            ?>
      </div>
      <div class="section-title with-hospital-color">
         <a href="{{route('blog')}}" class="default-btn">View All Blogs</a>
      </div>
   </div>
</div>
<div class="hospital-information-area pt-100 pb-230">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-4 col-md-6">
            <div class="hospital-information-card">
               <div class="content">
                  <div class="icon">
                     <i class='bx bx-map'></i>
                  </div>
                  <h3>Office Address</h3>
                  <p>{{$headerfooter[0]->offise_address}}</p>
               </div>
               <div class="shape">
                  <img src="assets/images/hospital/info-shape.png" alt="image">
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="hospital-information-card">
               <div class="content">
                  <div class="icon">
                     <i class='bx bx-envelope'></i>
                  </div>
                  <h3>Email Us</h3>
                  <p>
                     <a href="mailto:{{$headerfooter[0]->emailus}}"><span class="__cf_email__"
                        data-cfemail="2e474048416e495c47401b1a1d181a004d4143">{{$headerfooter[0]->emailus}}</span></a>
                  </p>
               </div>
               <div class="shape">
                  <img src="assets/images/hospital/info-shape.png" alt="image">
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="hospital-information-card">
               <div class="content">
                  <div class="icon">
                     <i class='bx bx-phone-call'></i>
                  </div>
                  <h3>Contact Us Free</h3>
                  <p>
                     <a href="tel: {{$headerfooter[0]->contact_us_free}}">
                     {{$headerfooter[0]->contact_us_free}}</a>
                  </p>
               </div>
               <div class="shape">
                  <img src="assets/images/hospital/info-shape.png" alt="image">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<section class="mapp">
   <div class="container">
      <div class="row">
         <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14720.13899289557!2d75.8818522!3d22.7269498!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3962fd40b745a7e5%3A0x179405de69e773a4!2sAarogya%20Superspeciality%20Modern%20Homoeopathic%20Clinic!5e0!3m2!1sen!2sin!4v1676878541729!5m2!1sen!2sin"
            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
   </div>
</section>
@endsection