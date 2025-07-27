<?php

namespace App\Http\Controllers;

use App\Models\Deputado;
use App\Jobs\SyncDeputadosJob;
use Illuminate\Http\Request;

class DeputadoController extends Controller
{
    public function index(Request $request)
    {
        $query = Deputado::query();
        if ($request->filled('nome')) {
            $query->where('nome', 'like', '%' . $request->nome . '%');
        }
        if ($request->filled('partido')) {
            $query->where('partido', $request->partido);
        }
        $deputados = $query->paginate(10);
        return view('deputados.index', compact('deputados'));
    }

    public function show(Deputado $deputado)
    {
        $despesas = $deputado->despesas()->paginate(10);
        return view('deputados.show', compact('deputado', 'despesas'));
    }

    public function sync()
    {
        SyncDeputadosJob::dispatch();
        return redirect()->route('deputados.index')->with('success', 'Sincronização iniciada!');
    }
}
