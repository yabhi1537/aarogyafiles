

@extends('layouts.admin')

@section('content')
@include('includes.tinyeditor')
<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.create_service') , array('Attr.EnableID' => true))}}</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{clean( trans('niva-backend.create_service') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">

                <a href="{{route('service.index') . '?language=' . request()->input('language')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.back_services') , array('Attr.EnableID' => true))}}</a>


                @if ($message = Session::get('service_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
   

                @include('includes.form-errors')

                <div class="row">
                    <div class="col-md-12">

                        <form action="{{route('service.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>Service Icon Image</strong>
                                                <input type="file"  name="icon" class="form-control-file"  id="icon">
                                            </div>
                                        </div> 
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="title" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.description') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="description" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.button_text') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="button_text" class="form-control">
                                    </div>
                                    
                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.button_link') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="text" name="button_link" class="form-control">
                                    </div>
                                    

                                    <div class="form-group">
                                        <strong>{{clean( trans('niva-backend.photo') , array('Attr.EnableID' => true))}}</strong>
                                        <input type="file"  name="photo_id" class="form-control-file"  id="photo_id">
                                    </div>

                                    <!--<div class="form-group">-->
                                    <!--    <strong>{{clean( trans('niva-backend.select_language') , array('Attr.EnableID' => true))}}</strong>-->
                                    <!--    <select name="language_id" id="language_id" class="form-control">-->
                                    <!--        @foreach($langs as $lang)-->
                                    <!--            <option value="{{ $lang->id }}">{{ $lang->name }}</option>-->
                                    <!--        @endforeach -->
                                    <!--    </select>-->
                                    <!--</div>-->
                                    
                                    <div class="form-group">
                                        <strong>Content</strong>
                                        <textarea name="content" class="form-control" id="editor1" rows="10"></textarea>
                                    </div>
                                    <div class='row'>
                                        
                                    
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <div class="form-group">
                                            <strong>{{clean( trans('niva-backend.keywords') , array('Attr.EnableID' => true))}}</strong>
                                            <input type="text" name="keywords"  class="form-control">
                                        </div>
                                    </div>
                                   <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.meta_title') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="meta_title" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <strong>{{clean( trans('niva-backend.meta_description') , array('Attr.EnableID' => true))}}</strong>
                                                <input type="text" name="meta_description" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
  

                                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary">{{clean( trans('niva-backend.create') , array('Attr.EnableID' => true))}}</button>
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