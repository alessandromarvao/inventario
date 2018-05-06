<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        $salas = Sala::orderBy('predio_id')->paginate(10);

        return view('salas.index', compact('salas'));
    }

    /**
     * Exibe as salas de acordo com o prédio selecionado
     *
     * @param string $predio
     * @return \Illuminate\Http\Response
     */
    public function showSalas($predio){
        $salas = Sala::select('id', 'sala')->where('predio',$predio)->get();
        return json_encode($salas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sala = new Sala;
        $sala->predio_id = $request->input('predio');
        $sala->sala = $request->input('sala');

        $sala->save();

		return response()->redirectToRoute('sala.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sala = Sala::findOrFail($id);
        return view('salas.show', compact('sala'));
    }

    public function search(Request $request)
    {
        $search = "%" . $request->input('search') . "%";
        $field = $request->input('select') ;

        switch ($field) {
            case 'sala':
            $salas = Sala::where($field, 'like' , $search)->distinct()->paginate(10);
            return view('salas.index')->with('salas', $salas);
            break;

            case 'predio':
            $salas = Sala::join('predios', 'predios.id', '=', 'salas.predio_id')
                ->where('predios.predio', 'like', $search)
                ->select('predios.*', 'salas.*')->paginate(10);
            
            // print_r($salas);
            return view('salas.index')->with('salas', $salas);
            break;
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sala = Sala::findOrFail($id);
        return view('salas.edit', compact('sala'));
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
        $sala = Sala::findOrFail($id);

        $sala->id = $request->id;
        $sala->predio_id = $request->predio;

		// $input = [
		// 	'_method' => $request->input('_method'),
		// 	'_token' => $request->input('_token'),
		// 	'id' => $id,
		// 	'predio_id' => $request->input('predio'),
		// 	'sala' => $request->input('sala')
        // ];
        $sala->save();

		// $sala->update($input);

		return response()->redirectToRoute('sala.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sala = Sala::findOrFail($id);
		$sala->delete();

		return response()->redirectToRoute('sala.index');
    }
}
