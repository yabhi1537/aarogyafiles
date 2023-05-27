

@extends('layouts.admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">All Gallery</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Gallery</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                 <a href="{{route('media.create')}}" class="btn btn-primary btn-back">All Gallery</a>
                @if ($message = Session::get('user_success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>    
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                <form action="{{route('delete.media')}}" method="post" class="form-inline">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    <div class="form-group">
                        <select name="checkBoxArray" id="" class="form-control">
                            <option value="">{{clean( trans('niva-backend.delete') , array('Attr.EnableID' => true))}}</option>
                        </select>
                    </div>
                    <div class="form-group">
                       <input type="submit" name="delete_all" class="btn btn-primary">
                    </div>
                    <table class=" table table-bordered media-index" id="dataTable">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="options"></th>
                                <th>{{clean( trans('niva-backend.id') , array('Attr.EnableID' => true))}}</th>
                                <th>images</th>
                                <th>Alt</th>
                                <th>{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</th>
                                <th>{{clean( trans('niva-backend.created') , array('Attr.EnableID' => true))}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                        @foreach($photos as $photo)
                            <tr>
                                <td><input class="checkboxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
                                <td>{{$photo->id}}</td>
                                <td><img height="70" src="{{asset('images/media/'.$photo->file)}}" alt=""></td>
                                 <td>
                                    <!--<form action="{{route('admin/medianame')}}" method="POST">-->
                                     <!--@csrf-->
                                        <input type="hidden" name="alttag" id='altid[<?php echo $i ?>]' value="{{$photo->id}}">
                                        <input type="text" id="alttagnname[<?php echo $i ?>]" alt="text" value='{{$photo->alttag}}' name="alttag" placeholder="Alt Tag">
                                        <button type="button" onclick='updateAlth(<?php echo $i ?>)' class="btn btn-primary">Submit</button>
                                    <!--</form>-->
                                    </td>
                                <td>
                                <td>
                                    <script type="text/javascript">
                                    function copy_clip{{$photo->id}}() {
                                          var copyText = document.getElementById("copy-clip{{$photo->id}}");
                                          copyText.select();
                                          copyText.setSelectionRange(0, 99999);
                                          document.execCommand("copy");
                                          alert("Copied the text: " + copyText.value);
                                    }
                                    </script>
                                    <input type="text" name="url-clip" class="form-control" id="copy-clip{{$photo->id}}" value="{{url('/')}}/images/media/{{$photo->file}}" readonly="" >
                                    <a class="btn btn-primary" onclick="copy_clip{{$photo->id}}()">{{clean( trans('niva-backend.copy_url') , array('Attr.EnableID' => true))}}</a>
                                </td>
                                <td>{{$photo->created_at ? $photo->created_at : 'no date' }}</td>
                                <input type="hidden" name="photo" value="{{$photo->id}}">
                            </tr>
                             <?php $i++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </form>
                {!! $photos->render() !!}
            </div>
        </div>
    </div>
</div>
<script>
    function updateAlth(id){
        var ids = $("#altid\\["+id+"\\]").val();
         var altName = $("#alttagnname\\["+id+"\\]").val();
        // alert(altName);
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });
        $.ajax({
            type:'post',
            url:"<?php echo route('admin/galleryAltname') ?>",
            data:{ids:ids,altName:altName,_token:'{{csrf_token()}}'},
        })
        location.reload();
    }
</script>
<!-- /.container-fluid -->
@stop
