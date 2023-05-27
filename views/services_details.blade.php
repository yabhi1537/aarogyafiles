@extends('layouts.front')

@section('content')
<style>
   p strong{
    
    color: black;
}
</style>
<div class="page-banner-area">
    <div class="container">
        <div class="page-banner-content">
            <h2><?php echo $services_detail[0]->title ?></h2>
            <ul class="pages-list">
                <li><a href="/aarogya">Home</a></li>
                <li><a href="/aarogya">Services</a></li>
                <li> <?php echo $services_detail[0]->title ?></li>
            </ul>
        </div>
    </div>
</div>

    <section class="services-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="services-details-image">
                        <img src="{{asset('images/media/')}}<?php echo "/".$photo[0]->file ?>" alt="<?php echo $photo[0]->alttag ?>">
                    </div>
                  
                    <div class="services-details-overview-content">
                        
                        <?php
                        echo $services_detail[0]->content
                        
                        ?>
                        <p><span>Conclusion:</span> <?php echo $services_detail[0]->description ?></p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                        <div class="widget widget_search">
                          
                        </div>
                        <div class="widget widget_categories">
                            <h3 class="widget-title">Services</h3>
                            <ul>
                                <?php
                                foreach($services as $key => $value){
                                    ?>
                                    <li><a href=" {{ route('services', $value->button_link)}}"><?php echo $value->title ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                      
                        <div class="widget widget_instagram">
                            <h3 class="widget-title">Gallery</h3>
                            <ul>
                                 @foreach($media as $key => $mediaVal)
                                <li>
                                    <div class="box">
                                        <img src="{{asset('images/media/'.$mediaVal->file)}}" alt="{{$mediaVal->alttag}}">
                                        <a href="#" target="_blank" class="link-btn"></a>
                                    </div>
                                </li>
                                @endforeach
                                
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection