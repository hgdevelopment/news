
@extends('admin.layout.hnews')
@section('sidebar')
@include('admin.partial.header')
{{-- @include('admin.partial.aside') --}}
@endsection

@section('body')
<div id="page-wrapper" style="min-height: 458px; max-height: 100% ;   margin: 0 0 0 0;">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Upload New 
                </div>
                <div class="panel-body">
                    <div class="row">

                        @if(session()->has('message'))
                        <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{session()->get('message')}} <a href="#" class="alert-link"Success</a>.
                        </div>
                        @endif

                        <div class="col-lg-9">
                            <form id="form" role="form" method="post" enctype="multipart/form-data"> 
                            {!! csrf_field() !!}
                            <div id="put"></div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title" id="title" placeholder="Enter Title" required>
                                    <p class="help-block">Enter video title  here.</p>
                                </div>


                                <div class="form-group">
                                    <label>Upload Type</label>
                                    <div class="checkbox">
                                        <label>
                                            Video&nbsp;&nbsp;&nbsp;<input type="radio" name="type" id="type1" value="video" checked="" onchange="setCheckBox('video')">
                                        </label>
                                    
                                        <label>
                                            Post&nbsp;&nbsp;&nbsp;<input type="radio" name="type" id="type2" value="post" onchange="setCheckBox('post')">
                                        </label>
                                    </div>
                                </div>


                                <div class="form-group" id="url-div">
                                    <label>Video URL//:</label>
                                    <input class="form-control" id="url" name="url"  placeholder="https://"  >
                                </div>


                                <div class="form-group">
                                    <label>Pick File</label>
                                    <input type="file" id="file" name="file" class="btn-outline btn-primary" >
                                </div>


                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" id="description" name="description" required></textarea>
                                </div>

								<div class="form-group">
								    <label>Categories</label>
								    <select class="form-control" name="categories" id="categories" required>

								        <option value="News">News</option>
								        <option value="Politics">Politics</option>
								        <option value="Environmental">Environmental</option>
								        <option value="Entertainment">Entertainment</option>
								        <option value="Sports">Sports</option>
								        <option value="Technology">Technology</option>
								    </select>
								</div>
                                <button id="submit" type="submit" class="btn btn-danger">Submit</button>&nbsp;&nbsp;&nbsp;
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                        <div class="col-lg-6"></div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>


        <div class="col-lg-9">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Our Uploaded videos
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                <div class="row" id="uploaded-videos"></div>
                </div>
                </div>

        </div>
                <!-- /.panel-body -->
    </div>
</div>
<input type="hidden" id="link" value="{{ URL::to('/') }}/admin/upload">
            <!-- /.row -->
@endsection
@section('jquery')
<script type="text/javascript">
function setCheckBox(type)
{
    if(type=='post')
    {
        $('#url-div').hide();
    }
    else
    {
        $('#url-div').show();
    }
}


function getUploadedContents()
{


    $.ajax({
    type: "get",
    url: "{{URL::to('/') }}/admin/upload/create",
    success: function (data) 
    {




        $("#uploaded-videos").append(data);
    }
    });

}
function edituploaded (id)
{

    $.ajax({
    type: "get",
    url: "{{URL::to('/') }}/admin/upload/"+id+"/edit",
    data: { method: 'post',"_token": "{{ csrf_token() }}"},
    success: function (data) 
    {



       $('form')[0].reset();

        $('#put').html('<input name="_method" value="PUT" type="hidden">');

        $('#title').val(data.title);

        
        $('input:radio[name=type]').filter('[value='+data.type+']').prop('checked', true);


        if(data.type=='video')
        {
        setCheckBox('video');
        $('#url').val(data.url);
        }
        else
         setCheckBox('post');

        $('#description').val(data.description);

        $('#categories').val(data.categories);

        $('#submit').html('Update');

        var link=$('#link').val();

        $('#form').attr('action',link+'/'+id);

    }

    });

}
var link=$('#link').val();
$('#form').attr('action',link);
$('#put').html('');
getUploadedContents();


</script>
@endsection