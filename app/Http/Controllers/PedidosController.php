<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\TipoMedicamento;
use App\Models\Distribuidor;
use App\Models\Sucursal;
use Illuminate\Http\Request;

class PedidosController extends Controller
{

    public function index()
    {
        // Obtener todos los pedidos con sus sucursales, distribuidores y tipos de medicamentos
        $pedidos = Pedidos::with(relations: ['sucursal', 'distribuidor', 'tipoMedicamento'])->get();

        // Verificar si hay pedidos
        if ($pedidos->isEmpty()) {
            return view('pedidos.vacio');
        }

        return view('pedidos.index', compact('pedidos'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener datos de las tablas
        $tiposMedicamentos = TipoMedicamento::all();
        $distribuidores = Distribuidor::all();
        $sucursales = Sucursal::all();

        // Retornar vista con datos
        return view('pedidos.create', compact('tiposMedicamentos', 'distribuidores', 'sucursales'));
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_medicamento' => 'required|alpha_num',
            'tipo_medicamento' => 'required|exists:tipos_medicamentos,id',
            'cantidad' => 'required|integer|min:1',
            'distribuidor' => 'required|exists:distribuidores,id',
            'sucursal' => 'required|array|max:1',
            'sucursal.*' => 'exists:sucursales,id',
        ]);

        // Obtener el distribuidor seleccionado
        $distribuidor = Distribuidor::find($request->distribuidor);

        // Obtener el nombre del tipo de medicamento
        $tipoMedicamento = TipoMedicamento::find($request->tipo_medicamento);

        // Crear el pedido y guardar en la base de datos
        foreach ($request->sucursal as $sucursal_id) {
            Pedidos::create([
                'nombre_medicamento' => $request->nombre_medicamento,
                'tipo_medicamento_id' => $request->tipo_medicamento,
                'cantidad' => $request->cantidad,
                'distribuidor_id' => $request->distribuidor,
                'sucursal_id' => $sucursal_id,
            ]);
        }

        // Obtener las sucursales seleccionadas y sus direcciones
        $sucursales = Sucursal::whereIn('id', $request->sucursal)->get(['nombre', 'direccion']);

        // Extraer los nombres y direcciones de las sucursales
        $nombresSucursales = $sucursales->pluck('nombre')->toArray();
        $direccionesSucursales = $sucursales->pluck('direccion')->toArray();

        // Formatear los textos según lo solicitado
        $nombresSucursalesTexto = implode(' y ', $nombresSucursales);
        $direccionesTexto = implode(' y ', $direccionesSucursales);


        // Guardar información en la sesión
        session()->flash('mensajeExito', "Pedido realizado con éxito.");
        session()->flash('titulo', $distribuidor->nombre);
        session()->flash('cantidad', $request->cantidad);
        session()->flash('tipo', $tipoMedicamento->nombre);
        session()->flash('nombre_medicamento', $request->nombre_medicamento);
        session()->flash('sucursal', $nombresSucursalesTexto);
        session()->flash('direccion_sucursal', $direccionesTexto);


        // Redirigir a la vista de éxito
        return redirect()->route(route: 'pedidos.pedido-exitoso');
    }

    public function edit($id)
    {
        // Busca el pedido por ID
        $pedido = Pedidos::findOrFail($id);

        // Obtén los tipos de medicamentos y distribuidores
        $tiposMedicamentos = TipoMedicamento::all();
        $distribuidores = Distribuidor::all();
        $sucursales = Sucursal::all(); // Si necesitas las sucursales también

        // Retorna la vista de edición con los datos necesarios
        return view('pedidos.editar', compact('pedido', 'tiposMedicamentos', 'distribuidores', 'sucursales'));
    }


    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre_medicamento' => 'required|regex:/^[\p{L}\p{N} ]+$/u',
            'tipo_medicamento' => 'required|exists:tipos_medicamentos,id',
            'cantidad' => 'required|integer|min:1',
            'distribuidor' => 'required|exists:distribuidores,id',
            'sucursal' => 'required|array|max:1',
            'sucursal.*' => 'exists:sucursales,id', // Asegura que cada sucursal exista
        ]);

        // Busca el pedido por ID
        $pedido = Pedidos::findOrFail($id);

        // Actualiza el pedido
        $pedido->nombre_medicamento = $request->nombre_medicamento;
        $pedido->tipo_medicamento_id = $request->tipo_medicamento;
        $pedido->cantidad = $request->cantidad;
        $pedido->distribuidor_id = $request->distribuidor;
        $pedido->sucursal_id = $request->sucursal[0]; 
        $pedido->save();

        // Guardar información en la sesión
        session()->flash('mensajeExito', "Pedido actualizado exitosamente.");
        session()->flash('titulo', "Pedido Actualizado");
        session()->flash('mensaje', "Revisa los detalles del pedido en la sección de listado.");

        return redirect()->route(route: 'pedido.actualizado');

    }


    public function destroy($id)
    {
        $pedido = Pedidos::findOrFail($id); // Encuentra el pedido o lanza un error si no se encuentra
        $pedido->delete(); // Elimina el pedido
        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado con éxito.');
    }
}
