@extends('layouts.app')

@section('title', 'Lista de Pedidos')

@section('content')
<div class="px-2 mt-5">
    <h1 class="mb-4">Lista de Pedidos</h1>

    <div class="table-responsive rounded">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre de Medicamento</th>
                    <th>Tipo de Medicamento</th>
                    <th>Distribuidor</th>
                    <th>Sucursal</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->id }}</td>
                    <td>{{ $pedido->nombre_medicamento }}</td>
                    <td>{{ $pedido->tipoMedicamento->nombre }}</td>
                    <td>{{ $pedido->distribuidor->nombre }}</td>
                    <td>{{ $pedido->sucursal->nombre }}</td>
                    <td>{{ $pedido->cantidad }}</td>
                    <td>
                        <a href="{{ route('pedidos.editar', $pedido->id) }}" class="btn btn-actualizar">Actualizar</a>
                        <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-eliminar" onclick="return confirm('¿Estás seguro de que deseas eliminar este pedido?');">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a href="{{ route('pedidos.create') }}" class="btn btn-pedido">Realizar un pedido</a>
    </div>
</div>
@endsection