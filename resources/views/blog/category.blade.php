@extends('layouts.app')

@section('title', $category->title)

@section('content')
	
	<div class="container">
		<div class="row">
        	@forelse ($articles as $article)
				<div class="col-sm-4 col-md-6" >
		 			<div class="row">
		        	  <div class="col-sm-12">
						
						 @isset($article->images()->first()->url)
        
                             <img class="img-fluid" src="{{ asset('/storage/'.$article->images()->first()->url) }}" alt="">
         
                        @endisset
			          {{--} <img src="{{$article->images()->url}}" alt="" height="400" width="500"> --}}
			     		<h4><a href="{{route('article', $article->slug)}}">{{$article->title}}</a></h4>
				    	<p>{!!$article->description_short!!}</p>
			          </div>
			        </div>
			    </div>
		    @empty
			   <h2 class="text-center">Пусто</h2>
		    @endforelse
 		{{$articles->links()}}
		</div>
	</div>

@endsection



 