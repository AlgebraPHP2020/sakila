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

<a href='{{route('actors.create')}}'>
    <span class="label label-info">Dodaj novi zapis</span></a>

<h3>Lista glumaca:</h3>
{{--
//print_r($glumci);
//dd($glumci); //display and die
--}}

{{ $glumci->links() }}
<ol start="{{ $glumci->firstItem() }}">
    @foreach ($glumci as $g)


    <li>
        <a href='{{url("/actors/{$g->actor_id}/edit")}}'>
            <span class="label label-info">Edit</span></a>
         
            <form class="form-inline" name="actor_delete" action="{{url("/actors/{$g->actor_id}")}}" method="POST" enctype="multipart/form-data">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>
        </form>


        &nbsp;&nbsp;<a href='{{url("/actors/{$g->actor_id}")}}'> {{$g->first_name }} {{$g->last_name }}</a>
    </li>

    @endforeach
</ol>
{{ $glumci->links() }}
@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
@stop