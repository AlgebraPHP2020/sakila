@extends('layouts.app')
@section('title', 'Dodaj novi film')
@section('content_header')
<h1>Novi film</h1>
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

<h3>Dodaj film:</h3>


<form method="POST" action="/films" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title<"> Naziv jezika:</label>
        <br>
        <input maxlength="128" type="text" name="title" required="true"
               value=""><br>
        
        <label for="description<"> Opis:</label>
        <br>
        <textarea name="description" rows="4" cols="20" required="false">
        </textarea><br>
        
        <label for="release_year"> Godina:</label>
        <br>
        <input min="1950" max="2019" id="ova_godina" type="number" name="release_year" required="true"
               value=""><br>
        <div style="display: inline-block">
            <label for="language_id<"> Jezik prijevoda:</label>      
            <select name="language_id" required="true">
            <option value=""></option>
             @foreach ($lista_jezika as $lang)
            <option value="{{$lang->language_id}}">{{$lang->name}}</option>
            @endforeach
        </select>  
        </div>
      
        
        <div style="display: inline-block"><label for="original_language_id<"> Jezik originala:</label>
        <select name="original_language_id">
            <option value=""></option>
             @foreach ($lista_jezika as $lang)
            <option value="{{$lang->language_id}}">{{$lang->name}}</option>
            @endforeach
        </select>   <br></div>  <br>
        
         <label for="rental_duration"> duljina najma:</label>
        <br>
        <input maxlength="3" type="number" name="rental_duration" required="true"
               value=""><br>
     
           <label for="rental_rate"> drental rate:</label>
        <br>
        <input maxlength="3" type="number" name="rental_rate" required="true" min="0" max="10" step="0.25" value="0.00"><br>
        
            
           <label for="length"> length:</label>
        <br>
        
        <input maxlength="3" type="number" name="length" required="true" min="0" max="10" step="0.25" value="0.00"><br>
        
        <!-- replacement_cost -->
           <label for="replacement_cost"> replacement_cost:</label>
        <br>
        <input maxlength="3" type="number" name="replacement_cost" required="true" min="0" max="10" step="0.25" value="0.00"><br>
        
        <!-- rating radio button  'G','PG','PG-13','R','NC-17' -->
        
          <p>Odaberite rating:</p>
  <input type="radio" id="rating_G" name="rating" value="G">
  <label for="rating_G">G</label><br>
  <input type="radio" id="rating_PG" name="rating" value="PG">
  <label for="rating_PG">PG</label><br>  
  <input type="radio" id="rating_PG13" name="rating" value="PG-13">
  <label for="rating_PG13">PG-13</label><br>
    <input type="radio" id="rating_R" name="rating" value="R">
  <label for="rating_R">R</label><br>
    <input type="radio" id="rating_NC17" name="rating" value="NC-17">
  <label for="rating_NC17">NC-17</label><br> <br>

  
  <!-- special_features CHECKBOX 'Trailers','Commentaries','Deleted Scenes','Behind the Scenes' -->
  <p>Odaberite dodatke:</p>
 <input type="checkbox" id="Trailers" name="special_features[]" value="Trailers">
<label for="Trailers"> Trailers</label><br>
<input type="checkbox" id="Commentaries" name="special_features[]" value="Commentaries">
<label for="Commentaries"> Commentaries</label><br>
<input type="checkbox" id="DeletedScenes" name="special_features[]" value="Deleted Scenes">
<label for="DeletedScenes"> Deleted Scenes</label><br>  
<input type="checkbox" id="BehindtheScenes" name="special_features[]" value="Behind the Scenes">
<label for="BehindtheScenes">Behind the Scenes</label><br>  
        

        
    </div>
    <div class="form-group">
        <input type="submit" name="dodaj_film_sbm" value="Dodaj novi film">
    </div>
</form>

@endsection

@section('css')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
@stop

@section('js')
<script> console.log('Hi!');</script>
<script>
   document.querySelector("#ova_godina").max = new Date().getFullYear();
</script>
@stop