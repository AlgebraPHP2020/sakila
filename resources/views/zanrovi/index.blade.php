@extends('layouts.app')
@section('title', 'Svi zanrovi')
@section('content_header')
<h1>Zanrovi</h1>
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

<a href='{{route('zanrovi.create')}}'>
    <i class="fas fa-plus"></i> <span class="label label-info">Dodaj novi zapis</span></a>

<h3>Lista zanrova:</h3>


<ol>
    @foreach ($zanrovi as $z)


    <li>
        &nbsp;&nbsp;<a href='{{url("/zanrovi/{$z->category_id}")}}'> {{$z->name }} {{$z->last_update }}</a>
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