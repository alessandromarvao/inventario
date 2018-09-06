<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class RelatorioController extends Controller
{
    public function listar(Request $request){
        if($request->sala){
            $salas = Item::where('sala_id', $request->sala)->get();
        } else {
            $salas = Item::all();
        }

        return view('relatorios.listar', compact('salas'));
        // $view = view('relatorios.listar', compact('salas'));
        // \PDF::setOptions(['']);
        // $pdf = \PDF::loadView('relatorios.listar', compact('salas'));
        // return $pdf->stream();
    }

    public function listarSituacoes(Request $request){
        switch($request->opcoes){
            case 1:
                echo "Localizados e não localizados";
                $salas = Item::orderBy('inventario')->get();
                return view('relatorios.listar', compact('salas'));
                break;
            case 2:
                echo "Particulares";
                $salas = Item::where('estado', 'Particular')->get();
                return view('relatorios.listar', compact('salas'));
                break;
            case 3:
                echo "Ociosos";
                $salas = Item::where('estado', 'Ocioso')->get();
                return view('relatorios.listar', compact('salas'));
                break;
            case 4:
                echo "Inservíveis";

                $salas = Item::where('estado', 'like', 'Inservível%')->get();
                return view('relatorios.listar', compact('salas'));
                break;
            case 5:
                echo "Observação";
                $salas = Item::whereNotNull('observacao')->get();
                return view('relatorios.listar', compact('salas'));
                break;
        }
    }
}
