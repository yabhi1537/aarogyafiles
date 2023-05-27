@extends('layouts.admin')

@section('content')
<style>
    #containerx {
     white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  max-width: 300px;
}
</style>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{clean( trans('niva-backend.allblog') , array('Attr.EnableID' => true))}}</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                {{clean( trans('niva-backend.allblog') , array('Attr.EnableID' => true))}}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive"  style="width: 100%;overflow-x: auto;">
                <div class="row">
                    <div class="col-lg-6">
                        <form action="{{ route('exportBlog')}}" method='post'>
                            @csrf
                        <a href="add/blog" class="btn btn-primary btn-back">Create Blog</a>
                        <a class="btn btn-primary btn-back" data-toggle="modal" data-target="#exampleModal">Import</a>
                            <button class='btn btn-primary' style="margin-top: -20px;">Export</button>
                        <!--<a href="{{ route('exportBlog')}}" class="btn btn-primary btn-back " target='_blank'>Export</a>-->
                        </form>
                    </div>
                    <div class="col-lg-6 text-right">
                        @if (!empty($langs))
                        <select name="language" class="form-control language-control"
                            onchange="window.location='{{url()->current() . '?language='}}'+this.value">
                            <option value="" selected disabled>
                                {{clean( trans('niva-backend.select_language') , array('Attr.EnableID' => true))}}
                            </option>
                            @foreach ($langs as $lang)
                            <option value="{{$lang->code}}"
                                {{$lang->code == request()->input('language') ? 'selected' : ''}}>{{$lang->name}}
                            </option>
                            @endforeach
                        </select>
                        @endif
                    </div>
                </div>
                @if ($message = Session::get('page_success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert"><i class="fas fa-times"></i></button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <!-- <form action="" method="POST" class="form-inline"> -->
                @csrf
                <!-- @method('DELETE') -->
                <!-- <div class="form-group">
                    <select name="checkbox_array" id="" class="form-control">
                        <option value="">{{clean( trans('niva-backend.delete') , array('Attr.EnableID' => true))}}
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" name="delete_all" class="btn btn-primary">
                </div> -->
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif 
                <table class="table table-bordered mt-4" id="dataTable" width="100%" style='overflow-x:auto;' cellspacing="0">
                    <thead>
                        <tr>
                            <!--<th><input type="checkbox" id="options"></th>-->
                            <th scope="col">{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}
                            </th>
                            <th scope="col">Heading</th>
                            <th scope="col">Discription</th>
                            <th scope="col">image</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <!-- <tfoot>
                        <tr>
                            <th><input type="checkbox" id="options1"></th>
                            <th scope="col">{{clean( trans('niva-backend.title') , array('Attr.EnableID' => true))}}</th>
                            <th scope="col">{{clean( trans('niva-backend.link') , array('Attr.EnableID' => true))}}</th>
                        </tr>
                    </tfoot> -->
                    <tbody>
                        @if($pages)
                        @foreach($pages as $page)
                        <?php $blogslug = str_replace(" ","-",$page->slug); ?>
                            
                        <tr id='row[{{$page->id}}]'>
                            <!--<td><input class="checkboxes" type="checkbox" name="checkbox_array[]" value="{{$page->id}}">-->
                            <!--</td>-->
                            <td class="page-title">{{$page->title}}</td>
                            <td class="page-title">{{$page->heading}}</td>
                            <td id='containerx' class="body-url" data-label="BODY">{{$page->discription}}</td>
                            <td class="body-url" data-label="BODY">
                                <?php
                                if ( strstr( $page->image_name, 'https://' ) ) {
                                    ?>
                                    <img width='70px;' src="{{$page->image_name}}" alt="" srcset="">
                                    <?php
                                    // echo "Text found";
                                } else {
                                    ?>
                                    <img width='70px;' src="assets/images/blog/{{$page->image_name}}" alt="" srcset="">
                                    <?php
                                    // echo "Text not found";
                                }
                                
                                ?>
                            </td>
                            <td style='white-space: nowrap;'><?php
                            $newDate = date("d-m-Y", strtotime($page->created_at));
                            ?>
                            {{$newDate}}</td>
                            <td><a href="blog.edit/{{$page->id}}" class='btn btn-sm btn-primary'><i class="fa fa-edit" aria-hidden="true"></i></a>
                                <button type='button' class='btn btn-sm btn-danger' onclick='deleteBlog({{$page->id}})'><i class="fa fa-trash" aria-hidden="true"></i></button>
                                <a href="{{ route('blog-details', $blogslug)}}" class='btn btn-sm btn-primary'><i class="fa fa-eye" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                         <div class='row'>
                             <!--{{ $pages->links() }}-->
                </div>
                    </tbody>
                </table>
                    {{$pages->links('pagination::bootstrap-4')}}
                <!-- </form> -->
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Blog Import</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('blog.excel')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class='form-group'>
                                <label for="">Select File</label>
                                <input type="file" name="file"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    class='form-controle' id="file">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                <a  href="{{asset('assets/blog_sample.xlsx')}}" class="btn btn-primary">Download</a>
            </div>
            </form>
        </div>
    </div>
</div>
@stop
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function deleteBlog(id) {
    // alert(id);

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "post",
                url: "{{route('delete.blog')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "id": id
                },
            }).done(function(done) {
                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                $("#row\\[" + id + "\\]").remove();
            })

        }
    })

}

function fileImport() {
    alert();
}
</script>