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
        $item->id = $request->id;
        $item->sala_id = $request->sala;
        $item->tombamento = $request->tombamento;
        $item->situacao = $request->situacao;
        $item->estado = $request->estado;
        $item->status = $request->status;

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
        if(!strcmp($field,'predio') || !strcmp($field,'sala'))
        {
            $itens = Item::select('itens.id', 'sala_id', 'tombamento', 'origem', 'descricao', 'num_serie', 'elemento_despesa', 'empenho', 'ug_empenho', 'data_entrada', 'nota_fiscal', 'data_nf', 'valor_inicial', 'valor_contabil', 'situacao', 'estado', 'responsavel', 'carga_contabil', 'status')
            ->join('salas', 'itens.sala_id', '=', 'salas.id')
            ->where('salas.'.$field, 'like', $search)->distinct()->paginate(25);
        } else
        {
            $itens = Item::where($field, 'like' , $search)->distinct()->paginate(25);
        }
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
        $item->sala_id = $request->sala;
        $item->tombamento = $request->tombamento;
        $item->situacao = $request->situacao;
        $item->estado = $request->estado;
        $item->status = $request->status;

        $item->save();

        return response()->redirectToRoute('item.index');
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
