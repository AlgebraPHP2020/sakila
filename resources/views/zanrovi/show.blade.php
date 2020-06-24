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

<h3>Lista filmova zanra <b> {{$lista_filmova_odabranog_zanra->first()->zanr()->first()->name}}:</b></h3>


<ol>
    @foreach ($lista_filmova_odabranog_zanra ?? '' as $f)


    <li>
        <a href='{{url("/films/{$f->film_id}/edit")}}'>
            <i class="fas fa-edit"></i></a>
         
            <form style="display:inline" class="form-inline" name="actor_delete" 
                  action="{{url("/films/{$f->filmid}")}}" 
                  method="POST" enctype="multipart/form-data">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger" style="font-size: xx-small">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </form>


        &nbsp;&nbsp;<a href='{{url("/films/{$f->film_id}")}}'> 
            {{$f->title}} ({{$f->release_year }})</a>
    </li>

    @endforeach
</ol>

@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop