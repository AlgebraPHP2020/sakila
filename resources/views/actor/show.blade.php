@extends('layouts.app')
@section('title', 'Svi predmeti')
@section('content_header')
<h1>Predmeti</h1>
@stop
<?php
//los nacin, kod treba nastojati ne ubacivati u view vec u kontroler ili model
function ikonica($zanr){
    switch ($zanr) {
        case 'Music':  $icon= '<i class="fas fa-music"></i>'; break;
        case 'Games':  $icon= '<i class="fas fa-gamepad"></i>'; break;
        case 'Comedy':  $icon= '<i class="fas fa-theater-masks"></i>'; break;
        case 'Action':  $icon= '<i class="fas fa-bomb"></i>'; break;
        case 'Drama':  $icon= '<i class="fas fa-house-damage"></i>'; break;
        case 'Documentary':  $icon= '<i class="fas fa-book"></i>'; break;
        case 'Horror':  $icon= '<i class="fas fa-biohazard"></i>'; break;
        case 'Sci-Fi':  $icon= '<i class="fas fa-robot"></i>'; break;
                                                        
        default:$icon=$zanr; break;
    }
    return $icon;
}
?>

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



            <tr><td style="padding: 20px">
                    <ul class="list-group">
                        <li class="list-group-item  list-group-item-success">Lista filmova u kojima glumi:</li>
                        @foreach ($actor->films()->get() ?? '' as $f)
                        <li class="list-group-item"><a href='{{url("/films/{$f->film_id}")}}'>
                                {{Str::title($f->title)}} ({{$f->release_year }})  {!! ikonica($f->zanr()->first()->name) !!} {!!$f->zanr()->first()->ikonica()!!}</a></li>
                                @endforeach
                    </ul>
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