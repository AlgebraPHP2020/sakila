@extends('layouts.app')
@section('title', 'Svi predmeti')
@section('content_header')
<h1>Predmeti</h1>
@stop


@section('content')
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}
</div>
@endif 

<h3>Detalji glumice/glumca: {{$actor->actor_id}}</h3>


<div class="border border-info rounded-md">
    <table>
        <thead><tr><th>{{$actor->first_name}} {{$actor->last_name}}</th>
            </tr><tr><th><i class="far fa-user big"></i></th></tr></thead>
        <tbody>
                     <tr><td>
                     <b>Broj filmova u kojima glumi:<span class="btn btn-outline-success">{{$actor->films()->count()}}</span>
                         </b>
                 </td></tr>
            <tr><td>
                    <img src="{{asset('storage/actor.jpg')}}" alt=""/></td></tr>  
        
            <tr><td>{{$actor->actor_id}}
                    {{$actor->last_update}}<br>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </td></tr> 
            
            <tr><td>
                     <b>Lista filmova u kojima glumi:
                         </b>
                 </td></tr>
    
             <tr><td>
                    
          @foreach ($actor->films()->get() ?? '' as $f)
          &nbsp;&nbsp;<a href='{{url("/films/{$f->film_id}")}}'> 
              {{Str::title($f->title)}} ({{$f->release_year }})</a><br>
          
          @endforeach
                </td></tr>            
        </tbody>
    </table>

</div>

@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop