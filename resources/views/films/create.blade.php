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


<form method="POST" action="/languages" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title<"> Naziv jezika:</label>
        <br>
        <input maxlength="128" type="text" name="title<" required="true"
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

       /*
Name=rental_duration<|||>OldName=rental_duration<|||>DataType=0<|||>OldDataType=50<|||>LengthSet=3<|||>Unsigned=1<|||>AllowNull=0<|||>ZeroFill=0<|||>LengthCustomized=0<|||>DefaultType=0<|||>DefaultText=<|||>OnUpdateType=0<|||>OnUpdateText=<|||>Comment=<|||>Charset=<|||>Collation=<|||>Expression=<|||>Virtuality=<|||>Status=0
Name=rental_rate<|||>OldName=rental_rate<|||>DataType=9<|||>OldDataType=50<|||>LengthSet=4,2<|||>Unsigned=0<|||>AllowNull=0<|||>ZeroFill=0<|||>LengthCustomized=0<|||>DefaultType=1<|||>DefaultText=4.99<|||>OnUpdateType=0<|||>OnUpdateText=<|||>Comment=<|||>Charset=<|||>Collation=<|||>Expression=<|||>Virtuality=<|||>Status=0
Name=length<|||>OldName=length<|||>DataType=1<|||>OldDataType=50<|||>LengthSet=5<|||>Unsigned=1<|||>AllowNull=1<|||>ZeroFill=0<|||>LengthCustomized=0<|||>DefaultType=0<|||>DefaultText=<|||>OnUpdateType=0<|||>OnUpdateText=<|||>Comment=<|||>Charset=<|||>Collation=<|||>Expression=<|||>Virtuality=<|||>Status=0
Name=replacement_cost<|||>OldName=replacement_cost<|||>DataType=9<|||>OldDataType=50<|||>LengthSet=5,2<|||>Unsigned=0<|||>AllowNull=0<|||>ZeroFill=0<|||>LengthCustomized=0<|||>DefaultType=1<|||>DefaultText=19.99<|||>OnUpdateType=0<|||>OnUpdateText=<|||>Comment=<|||>Charset=<|||>Collation=<|||>Expression=<|||>Virtuality=<|||>Status=0
Name=rating<|||>OldName=rating<|||>DataType=44<|||>OldDataType=50<|||>LengthSet='G','PG','PG-13','R','NC-17'<|||>Unsigned=0<|||>AllowNull=1<|||>ZeroFill=0<|||>LengthCustomized=0<|||>DefaultType=4<|||>DefaultText=G<|||>OnUpdateType=0<|||>OnUpdateText=<|||>Comment=<|||>Charset=<|||>Collation=utf8mb4_general_ci<|||>Expression=<|||>Virtuality=<|||>Status=0
Name=special_features<|||>OldName=special_features<|||>DataType=45<|||>OldDataType=50<|||>LengthSet='Trailers','Commentaries','Deleted Scenes','Behind the Scenes'<|||>Unsigned=0<|||>AllowNull=1<|||>ZeroFill=0<|||>LengthCustomized=0<|||>DefaultType=0<|||>DefaultText=<|||>OnUpdateType=0<|||>OnUpdateText=<|||>Comment=<|||>Charset=<|||>Collation=utf8mb4_general_ci<|||>Expression=<|||>Virtuality=<|||>Status=0
Name=last_update<|||>OldName=last_update<|||>DataType=22<|||>OldDataType=50<|||>LengthSet=<|||>Unsigned=0<|||>AllowNull=0<|||>ZeroFill=0<|||>LengthCustomized=0<|||>DefaultType=4<|||>DefaultText=current_timestamp()<|||>OnUpdateType=4<|||>OnUpdateText=current_timestamp()<|||>Comment=<|||>Charset=<|||>Collation=<|||>Expression=<|||>Virtuality=<|||>Status=0
Name=created_at<|||>OldName=created_at<|||>DataType=22<|||>OldDataType=50<|||>LengthSet=<|||>Unsigned=0<|||>AllowNull=1<|||>ZeroFill=0<|||>LengthCustomized=0<|||>DefaultType=0<|||>DefaultText=<|||>OnUpdateType=0<|||>OnUpdateText=<|||>Comment=<|||>Charset=<|||>Collation=<|||>Expression=<|||>Virtuality=<|||>Status=0
Name=updated_at<|||>OldName=updated_at<|||>DataType=22<|||>OldDataType=50<|||>LengthSet=<|||>Unsigned=0<|||>AllowNull=1<|||>ZeroFill=0<|||>LengthCustomized=0<|||>DefaultType=0<|||>DefaultText=<|||>OnUpdateType=0<|||>OnUpdateText=<|||>Comment=<|||>Charset=<|||>Collation=<|||>Expression=<|||>Virtuality=<|||>Status=0

       */
        
        
        
        
        
        
        
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
<script>
   document.querySelector("#ova_godina").max = new Date().getFullYear();
</script>
@stop