@extends('layouts.app')

@section('title', 'Actualizar Pedido')

@section('content')
<div class="px-2 mt-5">
    <h2 class="mb-4">Actualizar Pedido</h2>
    <form class="shadow p-4 rounded bg-light" action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="nombre_medicamento" class="form-label">Nombre del Medicamento:</label>
            <input type="text" class="form-control" id="nombre_medicamento" name="nombre_medicamento" value="{{ old('nombre_medicamento', $pedido->nombre_medicamento) }}">
            @error('nombre_medicamento')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="tipo_medicamento" class="form-label">Tipo de Medicamento:</label>
            <select class="form-select" id="tipo_medicamento" name="tipo_medicamento">
                <option value="">Selecciona un tipo</option>
                @foreach($tiposMedicamentos as $tipo)
                <option value="{{ $tipo->id }}" {{ old('tipo_medicamento', $pedido->tipo_medicamento_id) == $tipo->id ? 'selected' : '' }}>{{ $tipo->nombre }}</option>
                @endforeach
            </select>
            @error('tipo_medicamento')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label for="cantidad" class="form-label">Cantidad de Producto:</label>
            <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ old('cantidad', $pedido->cantidad) }}">
            @error('cantidad')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <fieldset class="mb-3">
            <legend class="form-label">Distribuidor:</legend>
            @foreach($distribuidores as $distribuidor)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="distribuidor" value="{{ $distribuidor->id }}" id="distribuidor_{{ $distribuidor->id }}" {{ old('distribuidor', $pedido->distribuidor_id) == $distribuidor->id ? 'checked' : '' }}>
                <label class="form-check-label" for="distribuidor_{{ $distribuidor->id }}">
                    {{ $distribuidor->nombre }}
                </label>
            </div>
            @endforeach
            @error('distribuidor')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </fieldset>

        <fieldset class="mb-4">
            <legend class="form-label">Sucursal:</legend>
            @foreach($sucursales as $sucursal)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="sucursal[]" value="{{ $sucursal->id }}" id="sucursal_{{ $sucursal->id }}" {{ $pedido->sucursal_id == $sucursal->id ? 'checked' : '' }}>
                <label class="form-check-label" for="sucursal_{{ $sucursal->id }}">
                    {{ $sucursal->nombre }} - {{ $sucursal->direccion }}
                </label>
            </div>
            @endforeach
            @error('sucursal')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </fieldset>


        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-form">Actualizar</button>
        </div>

    </form>
</div>
@endsection