@extends('layouts.app')

@section('content')
<div class="container">
  <div class="thumbnail" style="background-color: white;">
  <div class="row">
    @forelse ($articles as $article)
       @if ($article->categories()->first()->id == 1)

      			      <div class="col-sm-6 col-md-6" >
              <div class="thumbnail">
                  
                @isset($article->images()->first()->url)
                <a href="{{route('article', $article->slug)}}">
                <img class="img-fluid" src="{{ asset('/storage/'.$article->images()->first()->url) }}" width="550">
                </a>
                @endisset
                <div class="caption">
                  <h4><a href="{{route('article', $article->slug)}}">{{$article->title}}</a></h4>
                  <p>{!!$article->description_short!!}</p>
                </div>
			        </div>
            </div>
            @endif
            
            @empty
            <h2 class="text-center">Пусто</h2>
            @endforelse
          </div>
        </div>    
   
        
        <div class="thumbnail" style="background-color: white;">
         <div class="row">
          @forelse ($articles as $article)
           @if ($article->categories()->first()->id != 1)
              <div class="col-sm-12 col-md-12" >
               <div class="thumbnail">
                @isset($article->images()->first()->url)
                  <a href="{{route('article', $article->slug)}}">
                     <img class="img-fluid" src="{{ asset('/storage/'.$article->images()->first()->url) }}"
                       width="190" style="float:left; margin: 7px 7px 7px 7px;">
                   </a>
                @endisset
                 <div class="caption">
                   <h4>
                     <a href="{{route('article', $article->slug)}}">{{$article->title}}</a></h4>
                   <p>{!!$article->description_short!!}</p>
                   <br>
                 </div>
              </div>
            </div>
           @endif
          @empty
             <h2 class="text-center">Пусто</h2>
          @endforelse
        </div>
      </div>
        {{$articles->links()}}
</div>
@endsection
