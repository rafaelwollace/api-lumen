<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

abstract class BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $classe;

    public function index()
    {
        return $this->classe::all();
    }

    public function store(Request $request)
    {
        return response()
            ->json(
                $this->classe::create($request->all()),
                201
            );
    }

    public function show(int $id)
    {
        $recurso =  $this->classe::find($id);
        if (is_null($recurso)) {
            return response()->json(['message' => 'nada encontrado'], 202);
        }
        return response()->json($recurso);
    }

    public function update(int $id, Request $request)
    {

        $recurso =  $this->classe::find($id);
        if (is_null($recurso)) {
            return response()->json(['message' => 'nada encontrado'], 404);
        }

        $recurso =  $this->classe::find($id);
        $recurso->fill($request->all());
        $recurso->save();
        return $recurso;
    }

    public function destroy(int $id)
    {
        $recurso =  $this->classe::destroy($id);
        if ($recurso == 0) {
            return response()->json(['message' => 'nada encontrado'], 404);
        }
        return response()->json(['message' => 'Removido com sucesso!'], 204);
    }
}
