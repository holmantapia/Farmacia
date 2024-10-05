@extends('layouts.app')

@section('title', 'Pedido Actualizado')

@section('content')
@if(session('mensajeExito'))
<div class="alert alert-success">{{ session('mensajeExito') }}</div>
@endif

<h2>{{ session('titulo') }}</h2>
<p>{{ session('mensaje') }}</p>


<a href="{{ route('pedidos.index') }}" class="btn btn-pedido">Lista de pedidos</a>
@endsection