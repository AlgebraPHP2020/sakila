@extends('layouts.app')
@section('title', 'Detalji jezika')
@section('content_header')
<h1>Predmeti</h1>
@stop


@section('content')
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}
</div>
@endif 

<h3>Detalji jezika {{$jez->name}}:</h3>

<h4>Broj filmova ciji je originalni jezik {{$jez->name}}: <span class="badge badge-secondary">{{$jez->films()->count()}} </span> <br><a href="/films/lang/{{$jez->language_id}}">prikazi</a></h4>
<h4>Broj filmova koji je preveden na {{$jez->name}}: <span class="badge badge-secondary">{{$jez->films_prevedeni()->count()}} </span><br><a href="/films/langtrans/{{$jez->language_id}}">prikazi</a></h4>
<div class="border border-info rounded-md">
    <span class="alert-success"> {{$jez->name}} {{$jez->last_update}}</span><br>
      Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                <br>
                <p>
                    <a href='{{route('languages.index')}}'> &nbsp;&nbsp;
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