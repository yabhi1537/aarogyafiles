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
                <h2>Galery</h2>
                <ul class="pages-list">
                    <li><a href="">Home</a></li>
                    <li>Image</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="blog-area" style="margin-top: 85px;">
        <div class="container">
            <div class="row">
            <?php
            foreach ($media as $key => $mediaVal) {
               ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-blog">
                        <div class="blog-image">
                            <img src="{{asset('images/media/'.$mediaVal->file)}}" alt="image" style="margin-top: -72px;">
                        </div>
                       
                    </div>
                </div>
                <?php
                }
                ?>
                <div class='row'>
                    {{$media->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </section>
 

@endsection
