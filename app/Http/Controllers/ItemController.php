<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itens = Item::paginate(25);
		return view('itens.index', compact('itens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->descricao = $request->descricao;
        $item->descricao_sugerida = $request->descricao_sugerida;
        $item->responsavel = $request->responsavel;
        $item->sala_id = $request->sala;
        $item->tombamento = $request->tombamento;
        $item->num_serie = $request->num_serie;
        $item->estado = $request->estado;
        $item->localizado = $request->localizado;
        $item->observacao = $request->observacao;
        $item->inventario = $request->inventario;
        $item->novo = 1;

        $item->save();

        return response()->redirectToRoute('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('itens.show', compact('item'));
    }

    public function search(Request $request)
	{
        $search = "%" . $request->input('search') . "%";
        $field = $request->input('select');
        if(!strcmp($field,'predio'))
        {
            $itens = Item::select('itens.id', 'sala_id', 'salas.sala', 'predios.predio', 'inventario', 'tombamento', 'descricao', 'descricao_sugerida', 'num_serie', 'valor_inicial', 'valor_contabil', 'estado', 'localizado', 'responsavel')
            ->leftJoin('salas', 'itens.sala_id', 'salas.id')
            ->leftJoin('predios', 'salas.predio_id', 'predios.id')
            ->groupBy('itens.id')
            ->where('predios.'.$field, 'like', $search)->paginate(25);
        } 
        elseif(!strcmp($field,'sala'))
        {
            $itens = Item::select('itens.id', 'sala_id', 'salas.sala', 'predios.predio', 'inventario', 'tombamento', 'descricao', 'descricao_sugerida', 'num_serie', 'valor_inicial', 'valor_contabil', 'estado', 'localizado', 'responsavel')
            ->leftJoin('salas', 'itens.sala_id', '=', 'salas.id')
            ->leftJoin('predios', 'salas.predio_id', '=', 'predios.id')
            ->where('salas.'.$field, 'like', $search)->groupBy('itens.id')->paginate(25);

        } else
        {
            switch($field){
                case "particular":
                    if(!strcmp($search,'sim')){
                        $search = 1;
                    } else {
                        $search = 0;
                    }
                    $itens = Item::where($field, $search)->distinct()->paginate(25);
                    break;
                case "localizado":
                    if(!strcmp($search,'%sim%') || !strcmp($search, '%s%')){ //não localizado
                        $search = 1;
                    } else { //localizado
                        $search = 0;
                    }
                    $itens = Item::where($field, $search)->distinct()->paginate(25);
                    break;
                default:
                $itens = Item::where($field, 'like' , '%' . $search . '%')->distinct()->paginate(25);
            }
        }
        // print_r($itens);
        return view('itens.index', compact('itens'));
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('itens.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->inventario = $request->inventario;
        $item->descricao = $request->descricao;
        $item->descricao_sugerida = $request->descricao_sugerida;
        $item->responsavel = $request->responsavel;
        $item->sala_id = $request->sala;
        $item->tombamento = $request->tombamento;
        $item->num_serie = $request->num_serie;
        $item->estado = $request->estado;
        $item->observacao = $request->observacao;

        $item->save();

        return response()->redirectToRoute('item.index');
    }

    /**
     * 
     * Update the resource LOCALIZADO in storage.
     *  
     * @param  \Illuminate\Http\Request  $request
     */
    public function localizado($id, $value){
        $itens = Item::findOrFail($id);
        $itens->localizado = $value;
        $itens->save();

        // return response()->redirectToRoute('item.index');
        // return view('itens.index')->with('itens', $itens);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return response()->redirectToRoute('item.index');
    }
}
