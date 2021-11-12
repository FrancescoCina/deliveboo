@extends('layouts.app')

@section('content')

<h1 class="text-success text-center mb-4">{{$plate->name}}</h1>

    <div class="container d-flex ">
        <div class="col-6 pt-5">
            <h5>{{$plate->description}}</h5>
            <h6>Portata: <b>{{$plate->serving}}</b></h6>
            <h6>Prezzo: <b>{{$plate->price}} &euro;</b></h6>
            <h6>Categorie: <b>
               @forelse ($plate->categories as $category)
                <span class="badge" style="background-color: {{$category->color}}">{{$category->name}} </span>
               @empty
               Nessuna
               @endforelse </b></h6>

        </div>
        <div class="col-6 text-center">
            <img class="img-fluid w-75" src="{{asset('storage/'.$plate->image)}}" alt="{{$plate->name}}">
        </div>
    </div>
     <hr>
    <div class="container d-flex justify-content-center mt-5">
      <a href="{{ route('admin.plates.index')}}"><button class="btn btn-primary" type="submit" value="Torna alla lista">Torna ai tuoi piatti</button></a>
      <a href="{{route('admin.plates.edit', $plate->id)}}" class="btn btn-warning ml-2">Modifica</a>
        <form action="{{route('admin.plates.destroy', $plate->id)}}" method="post" class="delete-button">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger ml-2">Elimina</button>
        </form>
    </div>      
    @endsection

