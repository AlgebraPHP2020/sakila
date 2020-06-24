@extends('layouts.app')
@section('title', 'detalji')
@section('content_header')
<h1>{{$film->title}}</h1>
@stop


@section('content')
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}
</div>
@endif 

<h3>Detalji filma:</h3>


<div class="border border-info rounded-md">
    <h1 class="alert-success"> {{$film->title}} ({{$film->release_year}})</h1><br>
<h3> {{$film->zanr()->first()->name}}  </h3>
    <a href="/zanrovi/{{$film->zanr()->first()->category_id}}" class="alert-link">
        (svi filmovi zanra {{$film->zanr()->first()->name}})</a><br>

    <p class="rounded-md">{{$film->description}}</p>
    <p>
    <div class="alert alert-success" role="alert">
        Originalni jezik filma: <a href="/languages/{{$film->original_language_id}}" class="alert-link">
            {{$film->lang_orig()->first()->name}}</a>
    </div>
    <div class="alert alert-success" role="alert">
        Prijevod filma:         <a href="/languages/{{$film->language_id}}" class="alert-link">
            {{$film->lang_trans()->first()->name}}</a>
    </div>
    Duljina najma: <span class="btn btn-outline-success">{{$film->rental_duration}}</span> <br>
    Cijena po danu: <span class="btn btn-outline-success">€{{$film->rental_rate}} </span><br>
    Ukupna cijena: <span class="btn btn-outline-success">€{{$film->rental_rate*$film->rental_duration}} </span><br>        
    </p>

    Ukupno glumaca:<span class="btn btn-outline-success"> {{$film->actors()->count()}}</span>
    @foreach ($film->actors()->get() as $g)
    <p style="text-indent: 50px;">
        <i class="far fa-user big"></i><a href='{{url("/actors/{$g->actor_id}")}}'> {{$g->first_name }} {{$g->last_name }}</a>
    </p> 
    @endforeach


    <p>
        <a href='{{route('films.index')}}'> Natrag na listu filmova
            <i class="fas fa-hand-point-left"></i></a> 
    </p>


</div>

@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop