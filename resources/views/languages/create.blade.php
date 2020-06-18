@extends('layouts.app')
@section('title', 'Dodaj novi jezik')
@section('content_header')
<h1>Glumci</h1>
@stop


@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@error('message')
    <div class="alert alert-success">{{ $message }}</div>
@enderror

<h3>Dodaj glumica/glumicu:</h3>


<form method="POST" action="/languages" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name"> Naziv jezika:</label>
        <br>
        <input maxlength="20" type="text" name="name" required="true"
               value=""><br>
    </div>
    <div class="form-group">
        <input type="submit" name="actor_sbm" value="Dodaj novi jezik">
    </div>
</form>

@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop