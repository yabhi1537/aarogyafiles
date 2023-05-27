@extends('layouts.front')
@section('content')

 <div class="page-banner-area">
        <div class="container">
            <div class="page-banner-content">
                <h2><?php echo $blog[0]->slug ?></h2>
                <ul class="pages-list">
                    <li><a href="/aarogya">Home</a></li>
                    <li><a href="{{route('blog')}}">blog</a></li>
                    <li><?php echo $blog[0]->slug ?></li>
                </ul>
            </div>
        </div>
    </div>

    <section class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-image">
                              <?php
                                if ( strstr( $blog[0]->image_name, 'https://' ) ) {
                                    ?>
                                    <img src="{{$blog[0]->image_name}}" alt="{{$blog[0]->alt}}"></a>
                                    <?php
                                    // echo "Text found";
                                } else {
                                    ?>
                                    <img src="{{asset('assets/images/blog/'.$blog[0]->image_name)}}" alt="{{$blog[0]->alt}}"></a>
                                    <?php
                                    // echo "Text not found";
                                }
                                
                                ?>
                            <!--<img src="<?php echo $blog[0]->image_name ?>" alt="image">-->
                            <!-- <div class="tag">10 Jun</div> -->
                            <div class="tag-two"><a href="blog-details.html"><?php echo $blog[0]->title ?></a></div>
                        </div>
                        <div class="article-content" style="margin-top: 70px;">
                            <div class="entry-meta">
                                <ul>
                                    <li>
                                        <span>Posted On:</span>
                                        <?php echo date('M d, Y', strtotime( $blog[0]->created_at)); ?>
                                    </li>
                                    </br>
                                    <li>
                                        <span>Posted By:</span>
                                        <a href="blog-details.html">Aarogya Super Speciality Modern Homoeopathic Clinic</a>
                                    </li>
                                </ul>
                            </div>
                            <h3>New Technology Make for Dental Operation</h3>
                            <p><?php echo $blog[0]->discription ?></p>
                           
                        </div>
                      
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area">
                        <div class="widget widget_search">
                          
                        </div>
                        
                        <div class="widget widget_grin_posts_thumb">
                            <h3 class="widget-title">Recent posts</h3>
                            @foreach($recentPost as $key => $post)
                            <?php
                                $blogslug = str_replace(" ","-",$post->slug);
                            
                            ?>
                            
                            
                                
                            
                            <article class="item">
                                <a href="{{ route('blog-details', $blogslug) }}" class="thumb">
                                    <span style="background-image: url({{$post->image_name}});" class="fullimage cover bg1" role="img"></span>
                                </a>
                                <div class="info">
                                    <span>
                                       <?php echo date('M d, Y', strtotime( $post['created_at'])); ?>
                                       </span>
                                    <h4 class="title usmall">
                                        <a href="{{ route('blog-details', $blogslug) }}">{{$post->title}}</a>
                                    </h4>
                                </div>
                            </article>
                            @endforeach
                           
                        </div>
                        
                        
                        <div class="widget widget_instagram">
                            <h3 class="widget-title">Gallery</h3>
                            <ul>
                                @foreach($media as $key => $mediaVal)
                                <li>
                                    <div class="box">
                                        <img src="{{asset('images/media/'.$mediaVal->file)}}" alt="{{$mediaVal->alttag}}">
                                        <!--<a href="#" target="_blank" class="link-btn"></a>-->
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>



@endsection
