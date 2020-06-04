@extends('layouts.app')
@section('title', 'Svi predmeti')
@section('content_header')
<h1>Predmeti</h1>
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

<a href='{{route('languages.create')}}'>
    <i class="fas fa-plus"></i> <span class="label label-info">Dodaj novi zapis</span></a>

<h3>Lista jezika:</h3>


<ol>
    @foreach ($jezici as $jez)


    <li>
        <a href='{{url("/languages/{$jez->language_id}/edit")}}'>
            <i class="fas fa-edit"></i></a>
         
            <form style="display:inline" class="form-inline" name="actor_delete" action="{{url("/languages/{$jez->language_id}")}}" method="POST" enctype="multipart/form-data">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger" style="font-size: xx-small">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </form>


        &nbsp;&nbsp;<a href='{{url("/languages/{$jez->language_id}")}}'> {{$jez->name }} {{$jez->last_update }}</a>
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