@extends('layouts.admin')

@section('content')

@include('includes.tinyeditor')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Blog</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                Edit Blog</h6>
        </div>
        <div class="card-body">

            <a href="{{route('blog.list')}}"
                class="btn btn-primary btn-back">Back to Blog</a>
            @if ($message = Session::get('page_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                <strong>{{ $message }}</strong>
            </div>
            @endif

            @include('includes.form-errors')

            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('blog.updates')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="hdnid" value='{{$blog[0]->id}}'>
                                            <strong>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</strong>
                                            <input type="text" name="title" class="form-control" placeholder=""
                                                value="{{$blog[0]->title}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <strong>Heading</strong>
                                            <input type="text" name="heading" class="form-control" placeholder=""
                                                value="{{$blog[0]->heading}}">
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</strong>
                                                <div class="slug-container"><span>{{URL::to('/')}}/</span><input type="text" name="slug" class="form-control" placeholder="" value="{{$blog[0]->slug}}"></div>
                                            </div>
                                        </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <p><strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</strong>
                                            </p>
                                            <input type="file" name="image_name" class="form-control-file" id="image_name">
                                            </br>
                                            <img class="img-fluid pb-4" width="100" height="100" src="{{asset('assets/images/blog/'.$blog[0]->image_name)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.meta_title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="meta_title" class="form-control" placeholder="" value="{{$blog[0]->meta_title}}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.meta_description') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="meta_description" class="form-control" placeholder="" value="{{$blog[0]->meta_description}}">
                                            </div>
                                        </div>
                                    </div>
                                    
                                <div class="form-group">
                                    <strong>{{clean( trans('niva-backend.body') , array('Attr.EnableID' => true))}}</strong>
                                    <textarea name="body" class="form-control" id="body"
                                        rows="10">{{clean( $blog[0]->discription , array('Attr.EnableID' => true))}}</textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.keywords') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="keywords" value="{{$blog[0]->keywords}}"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <strong>Image Alt</strong>
                                        <input type="text" name="alt" class="form-control" placeholder="" value="{{$blog[0]->alt}}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.update') , array('Attr.EnableID' => true))}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->




@endsection