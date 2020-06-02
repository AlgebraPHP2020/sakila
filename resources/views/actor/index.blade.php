@extends('layouts.app')
@section('title', 'Svi predmeti')
@section('content_header')
<h1>Predmeti</h1>
@stop


@section('content')
<!-- Laravel < 7.* -->
 @if (Session::has('message'))
	<div class="alert alert-success">{{ Session::get('message') }}
  </div>
@endif 

<!-- Laravel > 7.* -->
@error('message') 
    <div class="alert alert-success">{{ $message }}</div>
@enderror

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