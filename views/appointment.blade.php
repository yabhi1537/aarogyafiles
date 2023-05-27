

@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Appoiments</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Appoiments</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <!-- <a href="{{route('media.create')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.upload_image') , array('Attr.EnableID' => true))}}</a>-->

                <!--@if ($message = Session::get('user_success'))-->
                <!--    <div class="alert alert-success alert-block">-->
                <!--        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    -->
                <!--        <strong>{{ $message }}</strong>-->
                <!--    </div>-->
                <!--@endif-->
              

                <form action="{{route('delete.appoiment')}}" method="post" class="form-inline">

                    {{csrf_field()}}

                    {{method_field('delete')}}


                    <!--<div class="form-group">-->
                    <!--    <select name="checkbox_array" id="" class="form-control">-->
                    <!--        <option value="">{{clean( trans('niva-backend.delete') , array('Attr.EnableID' => true))}}</option>-->
                    <!--    </select>-->
                    <!--</div>-->
                    <!--<div class="form-group">-->
                    <!--   <input type="submit" name="delete_all" class="btn btn-primary">-->
                    <!--</div>-->


                    <table class=" table table-bordered media-index" id="dataTable">
                        <thead>
                            <tr>
                                <!--<th><input type="checkbox" id="options"></th>-->
                                <th>Name</th>
                                <th>Reports</th>
                                <th>Phone</th>
                               <th>Service</th>
                               <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        @foreach($appointment as $appValue)
                        
                            <tr>
                                <!--<td><input class="checkboxes" type="checkbox" name="checkBoxArray[]" value="{{$appValue->id}}"></td>-->
                                <td>{{$appValue->name}}</td>
                                <td>
                                <img width='100px;' height='70px;' src="{{asset('storage/report_img/'.$appValue->reports)}}" alt="" srcset="">
                                </td>
                                <td>{{$appValue->phone}}</td>
                                <td>{{$appValue['sirvice']->title}}</td>
                                <td>{{$appValue->message}}</td>
                                <input type="hidden" name="photo" value="{{$appValue->id}}">
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$appointment->links('pagination::bootstrap-4')}}
                </form>
                
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@stop

