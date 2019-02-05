@extends('admin.layouts.app_admin')

@section('content')

<div class="container">

 <div class="container">
     <div class="row">
         <h1>Заголовок Изображения</h1>
         <form action="{{route('image.upload')}}"
               method="post" 
               enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
               
                <input type="file" name="image[]" value="1">
                <input type="file" name="image[]" value="2">

                <button class="btn btn-default" type="submit">Загрузка</button>
            </div>
         </form>

         @isset($path)
         <h3>{{$path}}</h3>
         <img class="img-fluid" src="{{ asset('/storage/'.$path) }}" alt="">
         
         
         @endisset

     </div>
 </div>
@endsection