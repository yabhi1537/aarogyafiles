

@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Enquiry</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Enquiry</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                 <!--<a href="{{route('media.create')}}" class="btn btn-primary btn-back">{{clean( trans('niva-backend.upload_image') , array('Attr.EnableID' => true))}}</a>-->

                @if($message = Session::get('user_success'))
                    <!--<div class="alert alert-success alert-block">-->
                    <!--    <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    -->
                    <!--    <strong>{{ $message }}</strong>-->
                    <!--</div>-->
                @endif

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
                                <th><input type="checkbox" id="options"></th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($contact as $contactValue)
                            <tr>
                                <td><input class="checkboxes" type="checkbox" name="checkBoxArray[]" value="{{$contactValue->id}}"></td>
                                <td>{{$contactValue->name}}</td>
                                <td>{{$contactValue->email}}</td>
                                <td>{{$contactValue->phone}}</td>
                                <td>{{$contactValue->subject}}</td>
                                <td>{{$contactValue->message}}</td>
                                <input type="hidden" name="photo" value="{{$contactValue->id}}">
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$contact->links('pagination::bootstrap-4')}}
                </form>
                
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@stop

