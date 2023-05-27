@extends('layouts.front')

   @section('content')
  <style type="text/css">
    .descrip{
    overflow: hidden;
    display: -webkit-box;
    text-align: center;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    }
  
    .imgps{
            position: relative;
            max-width: 100%;
           display: inline-block;
           vertical-align: middle;
             box-sizing: border-box;
             text-align: center;
            overflow-clip-margin: content-box;
            overflow: clip;
            --bs-gutter-x: 1.5rem;
         --bs-gutter-y: 0;
    }
  </style>

<div class="page-banner-area">
        <div class="container">
            <div class="page-banner-content">
                <h2>All Services</h2>
                <ul class="pages-list">
                    <li><a href="/aarogya">Home</a></li>
                    <li>all services</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container pt-50">
   <div class=" with-hospital-color d-flex justify-content-between align-items-center">
      <div class="section-title with-hospital-color">
         <h2>Services We Provide </h2>
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
            <img src="{{asset('images/media/'.$icon[0]->file)}}" style="height: 80px;width: 80px;" alt="">
               <img src="{{'images/media/'.$value->photo['file']}}" class="imgps" style="height: 80px;width: 80px;" alt="{{$value->photo['alttag']}}">
               <h3>
                  <a href="{{ route('services', $value->button_link)}}"><?php echo $value->title ?></a>
               </h3>
            </div>
            <p class="descrip"><?php echo $value->description?></p>
            <a href="{{ route('services', $value->button_link)}}" class="services-btn default-btn" style='background-color:#DF474A; color:#ffffff; border-radius: 6px;'> Read More</a>
         </div>
      </div>
      <?php
         }
         ?>
   </div>
   <!--        </div>-->
   <div class="srvc-btn pt-50 pb-50">
      <a href="#" class="default-btn">View All Services</a> 
   </div>
</div>
@endsection

