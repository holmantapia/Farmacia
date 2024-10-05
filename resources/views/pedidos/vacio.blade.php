
@extends('layouts.app')

@section('title', 'Sin Pedidos')

@section('content')
<div class="px-2 mt-5">
    <h1>No hay pedidos registrados</h1>
    <p>Actualmente no tienes ningún pedido registrado. Puedes realizar un pedido nuevo haciendo clic en el botón a continuación.</p>
    <a href="{{ route('pedidos.create') }}" class="btn btn-pedido">Realizar un pedido</a>
</div>
@endsection