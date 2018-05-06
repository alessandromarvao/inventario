<?php

namespace App\Http\Controllers;

use App\Predio;
use Illuminate\Http\Request;

class PredioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $predios = Predio::paginate();
        
        return view('predios.index', compact('predios'));
    }

    /**
     * Exibe os prédios cadastrados
     *
     * @return \Illuminate\Http\Response
     */
    public function showPredios(){
        $predios = Predio::get();
        return json_encode($predios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('predios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = [
            '_method' => $request->input('_method'),
            '_token' => $request->input('_token'),
            'predio' => $request->input('predio'),
        ];
        $predio = Predio::create($input);

		return response()->redirectToRoute('predio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $predio = Predio::findOrFail($id);
        return view('predios.show', compact('predio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $predio = Predio::findOrFail($id);
        return view('predios.edit', compact('predio'));
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
        $predio = Predio::findOrFail($id);
        $input = [
            '_method' => $request->input('_method'),
			'_token' => $request->input('_token'),
			'id' => $request->input('id'),
			'predio' => $request->input('predio'),
        ];
        
        $predio->update($input);
		return response()->redirectToRoute('predio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $predio = Predio::findOrFail($id);
        $predio->delete();
        
		return response()->redirectToRoute('predio.index');
    }
}
