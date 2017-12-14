@extends('home')

@section('container')


<div class="latest-posts" style="min-height: 600px;">
                    <div class="row"><br><br>
 						 @if(isset($posts))
                    	@foreach($posts as $post)
                    		<div class="col-xs-12 col-md-4" id="wid{{$post->id}}"> 
                            <div class="latest-post" id="widad{{$post->id}}">
       @if($post->type == 'post')                        
      <img width="270" height="190" src="{{URL::to('post/'.$post->file)}}"> 
         @elseif($post->type == 'video')
      <video width="270" height="190" controls="">
	  <source src="{{URL::to('post/'.$post->file)}}" type="video/mp4">
	  <source src="{{URL::to('post/'.$post->file)}}" type="video/ogg">
	  </video>
	     @elseif($post->type == 'link')
	     <iframe width="270" height="190" src="https://www.youtube.com/embed/{{$post->url}}" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
	  @endif

                                <div class="latest-post__categories">
                                    <ul class="post-categories">
                                        <li><a href="#" rel="category tag">{{$post->type}}</a></li>
                                    </ul>
                                </div>
                                <h4 class="latest-post__title"><a href="#">{{$post->title}}</a></h4>
                                <p class="latest-post__excerpt over" id="desc{{$post->id}}"> {{$post->description}} 
                                </p>
                                <span id="{{$post->id}}" onclick="showdes('{{$post->id}}')" style="float: right">read more</span>
                                <span id="less{{$post->id}}" onclick="showles('{{$post->id}}')" style="float: right;display: none;color:red;">CLOSE</span>
                                
                            </div>
                            </div>
                    	@endforeach
                    	@else
							<div class="col-xs-12 col-md-4"> 
                             <p>No news available at this moment</p>

                            </div>
                    	@endif
                        
                    </div>
                </div>

                               <script>
                              	function showdes(id){
                                		$('#desc'+id).removeClass("over");
                                		$('#wid'+id).addClass("col-md-12 overlay");
                                		$('#less'+id).show();
                                		$('#'+id).hide();
                                		$('#widad'+id).addClass('widad');
                              	}
                              	function showles(id){
                              		    $('#wid'+id).removeClass("col-md-12 overlay");
                                		$('#wid'+id).addClass("col-md-4");
                                		$('#desc'+id).addClass("over");
                                		$('#less'+id).hide();
                                		$('#'+id).show();
                                		$('#widad'+id).removeClass('widad');
                              	}
	                                
                                </script>
                @endsection

