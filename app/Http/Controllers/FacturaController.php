<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('facturas.index', [
            'facturas' => Factura::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'numero' => 'required|integer',
            'fecha' => 'required|date',
            'conceptos' => 'required|string',
            'iva' => 'required|numeric|between:0,99.99',
            'irpf' => 'required|numeric|between:0,99.99',
            'base_imponible' => 'required|numeric|between:1,99999',
            'importe_total' => 'required|numeric|between:1,99999',
        ]);

        $factura = Factura::create($validated);

        return redirect(route('facturas.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura): View
    {
        $this->authorize('update', $factura);

        return view('facturas.edit', [
            'factura' => $factura,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        // Verificar la autorización
        $this->authorize('update', $factura);

        // Validación de los datos del formulario (puedes ajustar esto según tus necesidades)
        $validatedData = $request->validate([
            'numero' => 'required|integer',
            'fecha' => 'required|date',
            'conceptos' => 'required|string',
            'iva' => 'required|numeric|between:0,99.99',
            'irpf' => 'required|numeric|between:0,99.99',
            'base_imponible' => 'required|numeric|between:1,99999',
            'importe_total' => 'required|numeric|between:1,99999',
        ]);

        // Actualizar los datos de la factura
        $factura->update($validatedData);

        // Redirigir a alguna ruta después de la actualización
        return redirect()->route('facturas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura): RedirectResponse
    {
        $this->authorize('delete', $factura);

        $factura->delete();

        return redirect(route('facturas.index'));
    }

}
