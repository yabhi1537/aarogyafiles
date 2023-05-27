@extends('layouts.front')

   @section('content')
   <style>
        .blog-content p{
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        
        .blog-content h3 a{
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
   </style>

<div class="page-banner-area">
        <div class="container">
            <div class="page-banner-content">
                <h2>Blog</h2>
                <ul class="pages-list">
                    <li><a href="/aarogya">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="blog-area pt-100 pb-100">
        <div class="container">
            <div class="section-title">
                <span class="sub-title">
                    <i class="flaticon-hashtag-symbol"></i>
                    Update News and Blogs
                </span>
                <h2>Stay Updated with Our Latest News and Blog</h2>
            </div>
            <div class="row">
            <?php
            foreach ($blog as $key => $value) {
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
                                }else{
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
                            <a href="{{ route('blog-details', $blogslug)}}" style="color:#06a3da;" class="blog-btn default-btn">Read More</a>
                            <ul class="entry-meta">
                            </ul>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
                <div class='row'>
                    {{$blog->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </section>
@endsection
