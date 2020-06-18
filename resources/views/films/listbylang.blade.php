@extends('layouts.app')
@section('title', 'filmovi na jeziku')
@section('content_header')
<h1>Filmovi</h1>
@stop


@section('content')
<!-- @TODO prikazi poruku kada se doda nova glumica -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Laravel > 7.* -->
@error('success') 
<div class="alert alert-success">{{ $success }}</div>
@enderror

<a href='{{route('films.create')}}'>
    <i class="fas fa-plus"></i> <span class="label label-info">Dodaj novi zapis</span></a>

<h3>Lista filmova ({{$filmovi->count()}}):</h3>


<ol>
    @foreach ($filmovi ?? '' as $f)


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