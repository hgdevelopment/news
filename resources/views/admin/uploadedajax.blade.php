@foreach($post as $post)


    <div class="col-md-3" style="margin-bottom: 10px !important">
	<form action="{{ URL::to('/') }}/admin/upload/{{ $post->id }}" method="POST" class="pull-right">
			              {{ method_field('DELETE') }}
			              {{ csrf_field() }}<input type="submit" class="btn btn-outline btn-danger pull-right btn-xs" value="X" >
    </form>

	&nbsp;&nbsp;&nbsp;&nbsp;

	<button type="button" class="btn btn-outline btn-danger pull-right btn-xs" onclick="edituploaded('{{ $post->id }}')" >Edit</button>

    <b>{{ $post->title }}</b>

    <br>
    
    @if($post->type=='video')

	<video width="280" height="200" controls>
	  
	  <source src="{{ URL::asset('storage/post/') }}/{{ $post->file }}" type="video/mp4">
	  
	  
	 <source src="{{ URL::asset('storage/post/') }}/{{ $post->file }}" type="video/ogg">
	
	</video>    

    @else

    	<img src="{{ URL::asset('storage/post/') }}/{{ $post->file }}" width="280" height="200">

    @endif


 	<br>
 	{{ $post->description }}
 	<br>
 	{{ $post->updated_at }}
 	</div>

@endforeach