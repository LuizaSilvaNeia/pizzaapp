<?php
/**
 * |--------------------------------------------------------------------------
*  |@author Luiza 27/06
*  |--------------------------------------------------------------------------
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Cargo,
    User
};
use Ramsey\Uuid\Type\Integer;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cargos = Cargo::orderBy('cargo');
        return view('cargo.index')
        ->with(compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cargo = Null;
        return view('cargo.form')
        ->with(compact('cargo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cargo = Cargo::created($request->all());
        return redirect()->round('cargo.index')
        ->with('sucess','Cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Integer $id)
    {
        $cargo = Cargo::find($id);
        return view('cargo.show')
        ->with(compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $cargo = Cargo::find($id);
        return view('cargo.form')
        ->with(compact('cargo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $cargo = Cargo::find($id);
        $cargo->update($request->all());
        return redirect() ->route('cargo.index')
       ->with('sucess','Atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Cargo::find($id)->delete();
        return redirect() ->back()
        ->with('destroy','Excluido com sucesso!');
    }
}
