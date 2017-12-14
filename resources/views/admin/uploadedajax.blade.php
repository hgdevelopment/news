@foreach($post as $post)


    <div class="col-md-3" style="margin-bottom: 10px !important">

    <b>{{ $post->title }}</b>

    <br>
    
    @if($post->type=='video')

	<video width="280" height="200" controls style="background: currentColor;">
	  
	  <source src="{{URL::to('post/'.$post->file)}}" type="video/mp4">
	  
	  
	 <source src="{{URL::to('post/'.$post->file)}}" type="video/ogg">
	
	</video>    

    @elseif($post->type=='link')
	<iframe width="280" height="200"
	src="https://www.youtube.com/embed/{{ $post->url }}">
	</iframe>
  


    @else

    	<img src="{{URL::to('post/'.$post->file)}}" width="280" height="200">

    @endif


 	<br>
 	<p class="over" style="text-overflow: ellipsis;">{{ $post->description }}</p>
 	<br>
 	{{ $post->updated_at }}
	<form action="{{ URL::to('/') }}/admin/upload/{{ $post->id }}" method="POST" class="pull-right">
			              {{ method_field('DELETE') }}
			              {{ csrf_field() }}<input style="position: absolute;right: 93px;top: 20px;" type="submit" class="btn  btn-danger pull-right btn-xs" value="X" >
    </form>

	&nbsp;&nbsp;&nbsp;&nbsp;

	<button style="position: absolute;right: 118;top: 20px;" type="button" class="btn  btn-warning pull-right btn-xs" onclick="edituploaded('{{ $post->id }}')" >Edit</button>
 	</div>

@endforeach