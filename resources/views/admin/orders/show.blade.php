@extends('layouts.app')

@section('content')
    

@if(!$restaurant)
  @include('includes.alert_restaurant')
@else  
<div class="container">
  <a class="btn btn-outline-secondary" href="{{ route('admin.orders.index') }}">Indietro</a>
</div>
<div class="container d-flex justify-content-center align-items-center">
    <div class="card my-5 py-3 font-size-2" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Ordine n° {{ $order->id }}</h5>
          {{-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> --}}
          <p class="card-text"><strong>Nome Cliente: </strong>{{ $order->customer_name }}</p>
          <p class="card-text"><strong>Cognome Cliente: </strong>{{ $order->customer_lastname }}</p>
          <p class="card-text"><strong>Indirizzo Cliente: </strong>{{ $order->customer_address }}</p>
          <p class="card-text"><strong>Email Cliente: </strong>{{ $order->customer_email }}</p>
          <p class="card-text"><strong>Prezzo: </strong> € {{ $order->amount }}</p>
          <p class="card-text"><strong>Pagato: </strong>  
            @if($order->is_payed)
            <span class="badge badge-pill badge-success">Pagato</span>
            @else
            <span class="badge badge-pill badge-danger">Da pagare</span>
            @endif
        </p>
        <ul>
          <h6><strong>Piatti nell'ordine:</strong> </h6>
          @foreach ($plates as $plate)
          <li>{{$plate->quantity}} - {{ $plate->name }}  </li>
              
          @endforeach
        </ul>
          <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}" class="delete-button">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger" type="submit">Elimina</button>
          </form>
      
    
            

          
   


    
         {{-- Bottone per softDelete --}}
    
        </div>
      </div>
</div>


{{-- Ingrandire font size??? --}}

@endif

@endsection